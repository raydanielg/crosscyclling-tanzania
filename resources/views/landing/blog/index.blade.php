@extends('landing.layout')

@section('body')
@include('landing.partials.header')

<main class="bg-gray-50">
    <section class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                <div>
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Blog</div>
                    <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">News & Updates</h1>
                    <p class="mt-3 text-gray-600">Habari fupi, tips, na updates za Cross Tanzania Cycling na matukio ya baiskeli.</p>
                </div>

                <nav class="text-sm text-gray-600">
                    <a href="{{ url('/') }}" class="font-bold text-gray-700 hover:text-[#2a527d] no-underline hover:no-underline">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-500">Blog</span>
                </nav>
            </div>
        </div>
    </section>

    <section class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6 rounded-3xl border border-gray-200 bg-white p-4 sm:p-5 shadow-sm">
                <form method="GET" action="{{ route('blog.index') }}" class="flex flex-col sm:flex-row gap-3">
                    <input
                        type="text"
                        name="q"
                        value="{{ request('q') }}"
                        placeholder="Search blog posts..."
                        class="flex-1 px-4 py-3 rounded-md border border-gray-300 bg-white focus:ring-2 focus:ring-[#2a527d] focus:border-[#2a527d] outline-none"
                    />
                    <button type="submit" class="px-6 py-3 rounded-md bg-[#2a527d] hover:bg-[#1e3a5f] text-white font-extrabold shadow">
                        Search
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <a href="{{ route('blog.show', $post->slug) }}" class="group rounded-3xl overflow-hidden border border-gray-200 bg-white shadow-sm hover:shadow-md transition no-underline hover:no-underline flex flex-col h-full">
                        <div class="relative h-56">
                            <img src="{{ $post->image_path ? asset($post->image_path) : '' }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-[1.02] transition" />
                        </div>
                        <div class="p-5 flex-1 flex flex-col">
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">{{ optional($post->published_at)->format('M Y') }}</div>
                            <div class="mt-2 font-extrabold text-gray-900 text-lg leading-snug min-h-[56px]">{{ $post->title }}</div>
                            <p class="mt-2 text-sm text-gray-600 leading-relaxed min-h-[60px]">{{ $post->excerpt }}</p>
                            <div class="mt-4 text-sm font-extrabold text-[#2a527d]">Read More</div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $posts->links() }}
            </div>

            @if ($posts->count() === 0)
                <div class="mt-10 text-center text-gray-600">
                    No blog posts found.
                </div>
            @endif
        </div>
    </section>
</main>

@include('landing.partials.footer')
@endsection
