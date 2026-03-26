<?php

use Illuminate\Support\Facades\Route;
use App\Models\BlogPost;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Rider\ProfileController;
use App\Http\Controllers\Rider\EventApplicationController;

Route::get('/sitemap.xml', function () {
    $posts = \App\Models\BlogPost::latest()->get();
    $events = \App\Models\Event::latest()->get();
    
    return response()->view('sitemap', [
        'posts' => $posts,
        'events' => $events,
    ])->header('Content-Type', 'text/xml');
});

Route::get('/', function () {
    $appliedEventIds = [];
    if (Auth::check()) {
        $appliedEventIds = Auth::user()->eventApplications()->pluck('event_id')->toArray();
    }

    $events = Event::query()
        ->orderByRaw("case status when 'open' then 1 when 'planned' then 2 when 'closed' then 3 else 4 end")
        ->latest('starts_at')
        ->take(3)
        ->get();

    $blogPosts = BlogPost::query()
        ->latest('published_at')
        ->take(3)
        ->get();

    return view('landing.index', compact('events', 'blogPosts', 'appliedEventIds'));
})->name('landing');

Route::view('/gallery', 'landing.gallery')->name('gallery');

Route::view('/about', 'landing.about')->name('about');

Route::get('/events', function (Request $request) {
    $status = $request->query('status');
    $appliedEventIds = [];
    if (Auth::check()) {
        $appliedEventIds = Auth::user()->eventApplications()->pluck('event_id')->toArray();
    }

    $query = Event::query();
    if ($status && $status !== 'all') {
        $query->where('status', $status);
    }

    $events = $query->orderByRaw("case status when 'open' then 1 when 'planned' then 2 when 'closed' then 3 else 4 end")
        ->latest('starts_at')
        ->paginate(6)
        ->withQueryString();

    $counts = [
        'all' => Event::count(),
        'open' => Event::where('status', 'open')->count(),
        'planned' => Event::where('status', 'planned')->count(),
        'closed' => Event::where('status', 'closed')->count(),
    ];

    return view('landing.events', compact('events', 'status', 'counts', 'appliedEventIds'));
})->name('events');

Route::view('/partners', 'landing.partners')->name('partners');

Route::view('/contact', 'landing.contact')->name('contact');

Route::get('/blog', function () {
    $q = trim((string) request()->query('q', ''));

    $posts = BlogPost::query()
        ->when($q !== '', function ($query) use ($q) {
            $query->where(function ($sub) use ($q) {
                $sub->where('title', 'like', "%{$q}%")
                    ->orWhere('excerpt', 'like', "%{$q}%")
                    ->orWhere('content', 'like', "%{$q}%");
            });
        })
        ->latest('published_at')
        ->paginate(9)
        ->withQueryString();

    return view('landing.blog.index', compact('posts', 'q'));
})->name('blog.index');

Route::get('/blog/{slug}', function (string $slug) {
    $post = BlogPost::query()->where('slug', $slug)->first();

    abort_if(!$post, 404);

    $morePosts = BlogPost::query()
        ->where('id', '!=', $post->id)
        ->latest('published_at')
        ->take(6)
        ->get();

    return view('landing.blog.show', compact('post', 'morePosts'));
})->name('blog.show');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role !== 'admin') abort(403);
        return view('admin.dashboard');
    })->name('dashboard');

    // Applications
    Route::get('/applications', function (\Illuminate\Http\Request $request) {
        if (auth()->user()->role !== 'admin') abort(403);
        
        $query = \App\Models\EventApplication::with(['user', 'event']);
        
        // Filter by Event
        if ($request->has('event_id') && $request->event_id != '') {
            $query->where('event_id', $request->event_id);
        }

        // Filter by Status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        $applications = $query->latest()->paginate(30); // Increased for better list view
        
        $stats = [
            'total' => \App\Models\EventApplication::count(),
            'pending' => \App\Models\EventApplication::where('status', 'pending')->count(),
            'approved' => \App\Models\EventApplication::where('status', 'approved')->count(),
            'rejected' => \App\Models\EventApplication::where('status', 'rejected')->count(),
        ];
        
        $events = \App\Models\Event::select('id', 'name')->get();
        $selectedEvent = $request->event_id ? \App\Models\Event::find($request->event_id) : null;
        
        return view('admin.applications.index', compact('applications', 'stats', 'events', 'selectedEvent'));
    })->name('applications.index');

    Route::post('/applications/{application}/status', function (\Illuminate\Http\Request $request, \App\Models\EventApplication $application) {
        if (auth()->user()->role !== 'admin') abort(403);
        $data = $request->validate(['status' => 'required|in:pending,approved,rejected']);
        
        $updateData = ['status' => $data['status']];
        
        // Generate rider number if approved and not already set
        if ($data['status'] === 'approved' && !$application->rider_number) {
            $prefix = strtoupper(substr($application->event->name ?? 'CTC', 0, 3));
            $lastNum = \App\Models\EventApplication::where('event_id', $application->event_id)
                ->whereNotNull('rider_number')
                ->count() + 1;
            $updateData['rider_number'] = $prefix . '-' . str_pad($lastNum, 4, '0', STR_PAD_LEFT);
        }

        $application->update($updateData);
        return back()->with('status', 'Application status updated');
    })->name('applications.status');

    // Users Management
    Route::get('/users', function () {
        if (auth()->user()->role !== 'admin') abort(403);
        $users = \App\Models\User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    })->name('users.index');

    // Events Management
    Route::get('/events', function () {
        if (auth()->user()->role !== 'admin') abort(403);
        $events = \App\Models\Event::latest()->paginate(15);
        return view('admin.events.index', compact('events'));
    })->name('events.index');

    Route::post('/events', function (\Illuminate\Http\Request $request) {
        if (auth()->user()->role !== 'admin') abort(403);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:open,planned,closed',
            'application_status' => 'required|in:open,closed',
            'starts_at' => 'required|date',
            'slots_total' => 'required|integer|min:1',
            'distance_km' => 'nullable|numeric',
            'route' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/Highlights', 'public');
            $data['image_path'] = $path;
        }
        unset($data['image']);
        
        $data['slots_remaining'] = $data['slots_total'];

        \App\Models\Event::create($data);
        return redirect()->route('admin.events.index')->with('status', 'Event created successfully');
    })->name('events.store');

    Route::put('/events/{event}', function (\Illuminate\Http\Request $request, \App\Models\Event $event) {
        if (auth()->user()->role !== 'admin') abort(403);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:open,planned,closed',
            'application_status' => 'required|in:open,closed',
            'starts_at' => 'required|date',
            'slots_total' => 'required|integer|min:1',
            'distance_km' => 'nullable|numeric',
            'route' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/Highlights', 'public');
            $data['image_path'] = $path;
        }
        unset($data['image']);

        $event->update($data);
        return redirect()->route('admin.events.index')->with('status', 'Event updated successfully');
    })->name('events.update');

    Route::delete('/events/{event}', function (\App\Models\Event $event) {
        if (auth()->user()->role !== 'admin') abort(403);
        $event->delete();
        return back()->with('status', 'Event deleted');
    })->name('events.destroy');

    // Blogs CRUD
    Route::get('/blogs', function () {
        if (auth()->user()->role !== 'admin') abort(403);
        $posts = \App\Models\BlogPost::latest()->paginate(15);
        return view('admin.blogs.index', compact('posts'));
    })->name('blogs.index');

    Route::get('/blogs/create', function () {
        if (auth()->user()->role !== 'admin') abort(403);
        return view('admin.blogs.create');
    })->name('blogs.create');

    Route::post('/blogs', function (\Illuminate\Http\Request $request) {
        if (auth()->user()->role !== 'admin') abort(403);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/Highlights', 'public');
            $data['image_path'] = $path;
        }
        unset($data['image']);
        
        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
        $data['author'] = auth()->user()->name;

        \App\Models\BlogPost::create($data);
        return redirect()->route('admin.blogs.index')->with('status', 'Post created successfully');
    })->name('blogs.store');

    Route::get('/blogs/{post}/edit', function (\App\Models\BlogPost $post) {
        if (auth()->user()->role !== 'admin') abort(403);
        return view('admin.blogs.edit', compact('post'));
    })->name('blogs.edit');

    Route::put('/blogs/{post}', function (\Illuminate\Http\Request $request, \App\Models\BlogPost $post) {
        if (auth()->user()->role !== 'admin') abort(403);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/Highlights', 'public');
            $data['image_path'] = $path;
        }
        unset($data['image']);
        
        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);

        $post->update($data);
        return redirect()->route('admin.blogs.index')->with('status', 'Post updated successfully');
    })->name('blogs.update');

    Route::delete('/blogs/{post}', function (\App\Models\BlogPost $post) {
        if (auth()->user()->role !== 'admin') abort(403);
        $post->delete();
        return back()->with('status', 'Post deleted');
    })->name('blogs.destroy');

    // Settings
    Route::get('/settings', function () {
        if (auth()->user()->role !== 'admin') abort(403);
        $settings = \Illuminate\Support\Facades\DB::table('payment_settings')->get();
        return view('admin.settings.index', compact('settings'));
    })->name('settings.index');

    Route::post('/settings', function (\Illuminate\Http\Request $request) {
        if (auth()->user()->role !== 'admin') abort(403);
        foreach ($request->except('_token') as $key => $value) {
            \Illuminate\Support\Facades\DB::table('payment_settings')
                ->updateOrInsert(['key' => $key], ['value' => $value, 'updated_at' => now()]);
        }
        return back()->with('status', 'Settings updated');
    })->name('settings.update');
});

Route::middleware('auth')->prefix('rider')->name('rider.')->group(function () {
    Route::view('/dashboard', 'rider.dashboard')->name('dashboard');

    Route::get('/events', function () {
        $user = Auth::user();
        $appliedEventIds = $user->eventApplications()->pluck('event_id')->toArray();

        $events = Event::query()
            ->orderByRaw("case status when 'open' then 1 when 'planned' then 2 when 'closed' then 3 else 4 end")
            ->latest('starts_at')
            ->paginate(10);

        return view('rider.events', compact('events', 'appliedEventIds'));
    })->name('events');

    Route::get('/my-events', [EventApplicationController::class, 'index'])->name('my-events');
    Route::get('/my-events/{application}', [EventApplicationController::class, 'show'])->name('my-events.show');

    Route::get('/events/{event}/apply', [EventApplicationController::class, 'step1'])->name('apply.step1');
    Route::post('/events/{event}/apply', [EventApplicationController::class, 'storeStep1'])->name('apply.step1.store');
    Route::get('/events/{event}/apply/{application}/payment', [EventApplicationController::class, 'step2'])->name('apply.step2');
    Route::post('/events/{event}/apply/{application}/payment', [EventApplicationController::class, 'storeStep2'])->name('apply.step2.store');
    Route::get('/events/{event}/apply/{application}/confirm', [EventApplicationController::class, 'step3'])->name('apply.step3');
    Route::post('/events/{event}/apply/{application}/finish', [EventApplicationController::class, 'finish'])->name('apply.finish');

    Route::get('/blogs', function () {
        $posts = BlogPost::query()->latest('published_at')->paginate(10);
        return view('rider.blogs', compact('posts'));
    })->name('blogs');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/awards', [ProfileController::class, 'storeAward'])->name('awards.store');
    Route::delete('/awards/{award}', [ProfileController::class, 'destroyAward'])->name('awards.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
