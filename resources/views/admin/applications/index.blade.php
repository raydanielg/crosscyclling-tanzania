@extends('admin.layout')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 print:hidden">
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Applications</h1>
            <p class="text-gray-500 font-medium">Usimamizi wa maombi yote ya {{ $selectedEvent ? $selectedEvent->name : 'matukio yote' }}.</p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <form action="{{ route('admin.applications.index') }}" method="GET" class="flex flex-wrap items-center gap-2">
                <select name="event_id" onchange="this.form.submit()" class="rounded-xl border border-gray-200 px-4 py-2 text-sm font-bold text-gray-700 focus:border-red-600 focus:ring-0 shadow-sm bg-white">
                    <option value="">All Events</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}" {{ request('event_id') == $event->id ? 'selected' : '' }}>
                            {{ $event->name }}
                        </option>
                    @endforeach
                </select>

                <select name="status" onchange="this.form.submit()" class="rounded-xl border border-gray-200 px-4 py-2 text-sm font-bold text-gray-700 focus:border-red-600 focus:ring-0 shadow-sm bg-white">
                    <option value="">All Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </form>
            <button onclick="window.print()" class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm font-bold text-gray-700 shadow-sm hover:bg-gray-50 transition-all flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Print List
            </button>
        </div>
    </div>

    <!-- Print Header (Only visible when printing) -->
    <div class="hidden print:block mb-8 border-b-2 border-gray-900 pb-4">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-black uppercase tracking-tighter">Cross Tanzania Cycling</h1>
                <h2 class="text-lg font-bold text-gray-700 uppercase">{{ $selectedEvent ? $selectedEvent->name : 'All Event Applications' }}</h2>
                <p class="text-xs font-bold text-gray-500">Ripoti ya Washiriki - Imetolewa: {{ date('M d, Y H:i') }}</p>
            </div>
            <div class="text-right">
                <div class="text-sm font-black">Total: {{ $applications->total() }}</div>
                <div class="text-[10px] font-bold uppercase">Admin Panel Report</div>
            </div>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 print:hidden">
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <div class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Total Applications</div>
            <div class="mt-1 text-3xl font-black text-gray-900">{{ $stats['total'] }}</div>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <div class="text-[10px] font-black uppercase text-amber-500 tracking-widest">Pending</div>
            <div class="mt-1 text-3xl font-black text-gray-900">{{ $stats['pending'] }}</div>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <div class="text-[10px] font-black uppercase text-green-500 tracking-widest">Approved</div>
            <div class="mt-1 text-3xl font-black text-gray-900">{{ $stats['approved'] }}</div>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <div class="text-[10px] font-black uppercase text-red-500 tracking-widest">Rejected</div>
            <div class="mt-1 text-3xl font-black text-gray-900">{{ $stats['rejected'] }}</div>
        </div>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-800">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 print:shadow-none print:border-none relative">
        <div class="w-full">
            <table class="w-full text-left border-collapse table-auto">
                <thead class="bg-gray-50/50">
                    <tr>
                        <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Rider Name</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Event</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Phone</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Status / Plate</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">History</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest text-right print:hidden">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($applications as $app)
                        @php
                            $previousCount = $app->user_id 
                                ? \App\Models\EventApplication::where('user_id', $app->user_id)
                                    ->where('id', '!=', $app->id)
                                    ->where('status', 'approved')
                                    ->count()
                                : 0;
                        @endphp
                        <tr class="hover:bg-gray-50/50 transition-all">
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-900 text-sm whitespace-nowrap">{{ $app->applicant_name }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-700 whitespace-nowrap">{{ $app->event?->name }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-600 whitespace-nowrap">{{ $app->applicant_phone }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-black uppercase whitespace-nowrap {{ $app->status === 'approved' ? 'bg-green-50 text-green-700' : ($app->status === 'rejected' ? 'bg-red-50 text-red-700' : 'bg-amber-50 text-amber-700') }}">
                                        {{ $app->status }}
                                    </span>
                                    @if($app->rider_number)
                                        <span class="text-xs font-black text-blue-600 tracking-wider whitespace-nowrap">{{ $app->rider_number }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($previousCount > 0)
                                    <span class="inline-flex items-center gap-1 text-[10px] font-black text-purple-600 uppercase bg-purple-50 px-2 py-0.5 rounded whitespace-nowrap">
                                        {{ $previousCount }} Prev
                                    </span>
                                @else
                                    <span class="text-[10px] font-bold text-gray-300 uppercase whitespace-nowrap">New</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right print:hidden relative">
                                <div x-data="{ open: false }" class="inline-block text-left">
                                    <button @click="open = !open" class="inline-flex items-center justify-center h-8 w-8 rounded-lg text-gray-400 hover:bg-gray-100 hover:text-gray-600 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>
                                    <div x-show="open" 
                                         x-transition:enter="transition ease-out duration-100"
                                         x-transition:enter-start="opacity-0 scale-95"
                                         x-transition:enter-end="opacity-100 scale-100"
                                         x-transition:leave="transition ease-in duration-75"
                                         x-transition:leave-start="opacity-100 scale-100"
                                         x-transition:leave-end="opacity-0 scale-95"
                                         @click.away="open = false" 
                                         x-cloak 
                                         class="absolute right-0 mt-2 w-48 rounded-2xl shadow-2xl bg-white border border-gray-100 z-[9999] p-2 space-y-1">
                                        <form method="POST" action="{{ route('admin.applications.status', $app) }}">
                                            @csrf
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="w-full text-left px-4 py-2 text-xs font-bold text-green-600 hover:bg-green-50 rounded-xl transition-all flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                Approve / Assign No
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.applications.status', $app) }}">
                                            @csrf
                                            <input type="hidden" name="status" value="pending">
                                            <button type="submit" class="w-full text-left px-4 py-2 text-xs font-bold text-amber-600 hover:bg-amber-50 rounded-xl transition-all flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Set Pending
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.applications.status', $app) }}">
                                            @csrf
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="w-full text-left px-4 py-2 text-xs font-bold text-red-600 hover:bg-red-50 rounded-xl transition-all flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Reject
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-50 print:hidden">
            {{ $applications->links() }}
        </div>
    </div>
@endsection
