@extends('rider.layout')

@section('content')
    <div class="flex items-center justify-between gap-4">
        <div>
            <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Blogs</div>
            <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900">Latest posts</h1>
            <p class="mt-2 text-gray-600">Soma updates na tips kutoka Cross Tanzania Cycling.</p>
        </div>

        <a href="{{ route('blog.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md border border-gray-300 text-gray-900 font-extrabold hover:bg-white no-underline hover:no-underline">Public Blog</a>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <a href="{{ route('blog.show', $post->slug) }}" class="group rounded-3xl overflow-hidden border border-gray-200 bg-white shadow-sm hover:shadow-md transition no-underline hover:no-underline flex flex-col">
                <div class="h-44 bg-gray-100">
                    <img src="{{ $post->image_path ? asset($post->image_path) : '' }}" alt="{{ $post->title }}" class="w-full h-full object-cover" />
                </div>
                <div class="p-5 flex-1 flex flex-col">
                    <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">{{ optional($post->published_at)->format('M Y') }}</div>
                    <div class="mt-2 font-extrabold text-gray-900 text-lg leading-snug">{{ $post->title }}</div>
                    <p class="mt-2 text-sm text-gray-600 leading-relaxed">{{ $post->excerpt }}</p>
                    <div class="mt-4 text-sm font-extrabold text-[#2a527d]">Read More</div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection
