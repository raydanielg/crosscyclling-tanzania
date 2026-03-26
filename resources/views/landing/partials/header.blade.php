<header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="h-18 md:h-20 flex items-center justify-between">
            <a href="{{ url('/') }}" class="group flex items-center gap-3 text-gray-900 no-underline hover:no-underline">
                <span class="inline-flex items-center justify-center rounded-2xl bg-white shadow ring-1 ring-gray-200 p-2">
                    <img
                        src="{{ asset('logo.png') }}"
                        alt="CTCMS Logo"
                        class="h-10 sm:h-11 md:h-12 w-auto object-contain drop-shadow-sm"
                    />
                </span>
            </a>

            <nav class="hidden md:flex items-center gap-2 text-sm font-semibold text-gray-700">
                <a href="{{ route('about') }}" class="px-3 py-2 rounded-lg hover:bg-gray-50 hover:text-[#1e3a5f] no-underline hover:no-underline">About</a>
                <a href="{{ route('events') }}" class="px-3 py-2 rounded-lg hover:bg-gray-50 hover:text-[#1e3a5f] no-underline hover:no-underline">Events</a>
                <a href="{{ route('blog.index') }}" class="px-3 py-2 rounded-lg hover:bg-gray-50 hover:text-[#1e3a5f] no-underline hover:no-underline">Blog</a>
                <a href="{{ route('partners') }}" class="px-3 py-2 rounded-lg hover:bg-gray-50 hover:text-[#1e3a5f] no-underline hover:no-underline">Partners</a>
                <a href="{{ route('contact') }}" class="px-3 py-2 rounded-lg hover:bg-gray-50 hover:text-[#1e3a5f] no-underline hover:no-underline">Contact</a>
            </nav>

            <div class="flex items-center gap-2 sm:gap-3">
                @auth
                    <a href="{{ route('home') }}" class="hidden sm:inline-flex px-4 py-2 rounded-md bg-gray-900 text-white text-sm font-bold shadow hover:bg-black no-underline hover:no-underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hidden sm:inline-flex px-4 py-2 rounded-md border border-gray-300 text-gray-800 text-sm font-bold hover:bg-gray-50 no-underline hover:no-underline">Login</a>
                    <a href="{{ route('register') }}" class="inline-flex px-4 py-2 rounded-md bg-[#2a527d] text-white text-sm font-bold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">Register</a>
                @endauth

                @include('landing.partials.mobile-menu')
            </div>
        </div>
    </div>
</header>
