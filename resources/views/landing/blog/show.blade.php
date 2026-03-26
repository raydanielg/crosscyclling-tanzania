@extends('landing.layout')

@section('body')
@include('landing.partials.header')

<main class="bg-gray-50" x-data="{ copied: false, copy(url) { navigator.clipboard.writeText(url); this.copied = true; setTimeout(() => this.copied = false, 1200); } }">
    <section class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                <div>
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Blog Post</div>
                    <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">{{ $post->title }}</h1>
                    <p class="mt-2 text-gray-600">{{ optional($post->published_at)->format('M d, Y') }}</p>
                </div>

                <nav class="text-sm text-gray-600">
                    <a href="{{ url('/') }}" class="font-bold text-gray-700 hover:text-[#2a527d] no-underline hover:no-underline">Home</a>
                    <span class="mx-2">/</span>
                    <a href="{{ route('blog.index') }}" class="font-bold text-gray-700 hover:text-[#2a527d] no-underline hover:no-underline">Blog</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-500">Details</span>
                </nav>
            </div>
        </div>
    </section>

    <section class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <div class="lg:col-span-8">
                    <div class="rounded-3xl overflow-hidden bg-black">
                        <img src="{{ $post->image_path ? asset($post->image_path) : '' }}" alt="{{ $post->title }}" class="w-full h-64 sm:h-80 object-cover" />
                    </div>

                    <div class="mt-6 bg-white rounded-3xl border border-gray-200 p-6 sm:p-8">
                        <p class="text-gray-700 leading-relaxed text-lg">{{ $post->excerpt }}</p>

                        <div class="mt-6 space-y-4 text-gray-700 leading-relaxed">
                            @foreach (preg_split("/\n\n+|\r\n\r\n+/", (string) $post->content) as $p)
                                @if (trim($p) !== '')
                                    <p>{{ $p }}</p>
                                @endif
                            @endforeach
                        </div>

                        <div class="mt-8 flex flex-col sm:flex-row gap-3">
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-md bg-[#2a527d] text-white font-extrabold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">
                                Join CTCMS
                            </a>
                            <a href="{{ route('blog.index') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-md border border-gray-300 text-gray-900 font-extrabold hover:bg-gray-50 no-underline hover:no-underline">
                                Back to Blog
                            </a>
                        </div>

                        <div class="mt-10 border-t border-gray-200 pt-6">
                            <div class="flex items-center justify-between gap-4">
                                <div class="font-extrabold text-gray-900">Share</div>
                                <div class="flex items-center gap-3">
                                    @php
                                        $shareUrl = url()->current();
                                        $shareText = $post->title . ' - ' . $shareUrl;
                                    @endphp

                                    <a
                                        href="https://wa.me/?text={{ urlencode($shareText) }}"
                                        target="_blank"
                                        rel="noreferrer"
                                        class="h-10 w-10 rounded-full bg-green-50 border border-green-200 text-green-700 hover:bg-green-100 flex items-center justify-center"
                                        aria-label="Share on WhatsApp"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor">
                                            <path d="M12.04 2a9.94 9.94 0 00-8.6 14.96L2 22l5.2-1.36A9.95 9.95 0 1012.04 2zm5.8 14.5c-.25.71-1.46 1.36-2 1.44-.5.08-1.12.11-1.8-.12-.41-.13-.93-.3-1.6-.6-2.8-1.22-4.63-4.2-4.77-4.4-.14-.2-1.13-1.5-1.13-2.86 0-1.36.71-2.03.96-2.31.25-.28.55-.35.73-.35h.52c.17 0 .4-.06.62.47.25.6.84 2.06.91 2.2.08.14.13.33.02.53-.11.2-.17.33-.33.51-.17.17-.35.38-.5.51-.17.17-.35.35-.15.68.2.33.9 1.47 1.93 2.38 1.33 1.18 2.45 1.55 2.78 1.7.33.14.52.12.71-.08.2-.2.82-.96 1.04-1.29.22-.33.44-.28.73-.17.3.11 1.87.88 2.2 1.04.33.17.55.25.63.38.08.13.08.76-.17 1.47z"/>
                                        </svg>
                                    </a>

                                    <button
                                        type="button"
                                        @click="copy('{{ url()->current() }}')"
                                        class="h-10 w-10 rounded-full bg-gray-50 border border-gray-200 text-gray-700 hover:bg-gray-100 flex items-center justify-center"
                                        aria-label="TikTok / Copy Link"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor">
                                            <path d="M16.6 3c.4 2.3 2 4.1 4.3 4.4v3.2c-1.6 0-3-.5-4.3-1.4v6.1c0 3.7-3 6.7-6.7 6.7S3.2 19 3.2 15.3c0-3.7 3-6.7 6.7-6.7.4 0 .8 0 1.2.1v3.5c-.4-.2-.8-.3-1.2-.3-1.8 0-3.3 1.5-3.3 3.3 0 1.8 1.5 3.3 3.3 3.3 1.9 0 3.4-1.5 3.4-3.4V3h3.3z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="mt-2 text-xs text-gray-500" x-show="copied" x-cloak>
                                Link copied.
                            </div>
                        </div>

                        <div class="mt-10 border-t border-gray-200 pt-6">
                            <div class="font-extrabold text-gray-900">Comments</div>
                            <p class="mt-3 text-gray-600">Habari fupi, tips, na updates za Cross Tanzania Cycling na matukio ya baiskeli.</p>

                            <form class="mt-6 grid gap-3">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <input type="text" placeholder="Your name" class="px-4 py-3 rounded-md border border-gray-300 bg-white focus:ring-2 focus:ring-[#2a527d] focus:border-[#2a527d] outline-none" />
                                    <input type="email" placeholder="Email" class="px-4 py-3 rounded-md border border-gray-300 bg-white focus:ring-2 focus:ring-[#2a527d] focus:border-[#2a527d] outline-none" />
                                </div>
                                <textarea rows="4" placeholder="Write your comment..." class="px-4 py-3 rounded-md border border-gray-300 bg-white focus:ring-2 focus:ring-[#2a527d] focus:border-[#2a527d] outline-none"></textarea>
                                <button type="button" class="justify-self-start px-6 py-3 rounded-md bg-[#2a527d] hover:bg-[#1e3a5f] text-white font-extrabold shadow">
                                    Post Comment
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <aside class="lg:col-span-4">
                    <div class="bg-white rounded-3xl border border-gray-200 p-5">
                        <div class="font-extrabold text-gray-900">Search</div>
                        <form method="GET" action="{{ route('blog.index') }}" class="mt-3 flex gap-2">
                            <input
                                type="text"
                                name="q"
                                placeholder="Search..."
                                class="flex-1 px-4 py-3 rounded-md border border-gray-300 bg-white focus:ring-2 focus:ring-[#2a527d] focus:border-[#2a527d] outline-none"
                            />
                            <button type="submit" class="px-4 py-3 rounded-md bg-[#2a527d] hover:bg-[#1e3a5f] text-white font-extrabold shadow">Go</button>
                        </form>

                        <div class="mt-8">
                            <div class="font-extrabold text-gray-900">More Blogs</div>
                            <div class="mt-4 divide-y divide-gray-200">
                                @foreach ($morePosts as $p)
                                    <a href="{{ route('blog.show', $p->slug) }}" class="py-4 flex gap-3 items-start no-underline hover:no-underline hover:bg-gray-50 transition">
                                        <div class="h-16 w-16 rounded-xl overflow-hidden bg-gray-100 border border-gray-200 flex-shrink-0">
                                            <img src="{{ $p->image_path ? asset($p->image_path) : '' }}" alt="{{ $p->title }}" class="w-full h-full object-cover" />
                                        </div>
                                        <div class="min-w-0">
                                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">{{ optional($p->published_at)->format('M Y') }}</div>
                                            <div class="mt-1 font-extrabold text-gray-900 leading-snug">
                                                {{ $p->title }}
                                            </div>
                                            <div class="mt-1 text-xs text-gray-600 line-clamp-2">{{ $p->excerpt }}</div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</main>

@include('landing.partials.footer')
@endsection
