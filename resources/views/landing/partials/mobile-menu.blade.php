<div x-data="{ open: false }" class="md:hidden">
    <button type="button" @click="open = !open" class="inline-flex items-center justify-center h-10 w-10 rounded-lg border border-gray-200 bg-white text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#2a527d]/40">
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <div x-show="open" x-transition x-cloak class="absolute left-0 right-0 top-16 bg-white border-b border-gray-100 shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 grid gap-3 text-sm font-semibold text-gray-700">
            <a href="{{ route('about') }}" @click="open=false" class="hover:text-[#1e3a5f] no-underline hover:no-underline">About</a>
            <a href="{{ route('events') }}" @click="open=false" class="hover:text-[#1e3a5f] no-underline hover:no-underline">Events</a>
            <a href="{{ route('blog.index') }}" @click="open=false" class="hover:text-[#1e3a5f] no-underline hover:no-underline">Blog</a>
            <a href="{{ route('partners') }}" @click="open=false" class="hover:text-[#1e3a5f] no-underline hover:no-underline">Partners</a>
            <a href="{{ route('contact') }}" @click="open=false" class="hover:text-[#1e3a5f] no-underline hover:no-underline">Contact</a>

            <div class="pt-3 border-t border-gray-100 flex flex-col gap-2">
                <a href="{{ route('login') }}" class="px-4 py-2 rounded-md border border-gray-300 text-gray-800 font-bold hover:bg-gray-50 no-underline hover:no-underline">Login</a>
                <a href="{{ route('register') }}" class="px-4 py-2 rounded-md bg-[#2a527d] text-white font-bold hover:bg-[#1e3a5f] no-underline hover:no-underline">Register</a>
            </div>
        </div>
    </div>
</div>
