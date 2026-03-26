<aside class="hidden lg:block w-64 flex-shrink-0">
    <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-4">
        <nav class="grid gap-2 text-sm font-semibold">
            <a href="{{ route('rider.dashboard') }}" class="px-3 py-2 rounded-2xl hover:bg-gray-50 no-underline hover:no-underline {{ request()->routeIs('rider.dashboard') ? 'bg-[#2a527d]/10 text-[#2a527d]' : 'text-gray-700' }}">Dashboard</a>
            <a href="{{ route('rider.events') }}" class="px-3 py-2 rounded-2xl hover:bg-gray-50 no-underline hover:no-underline {{ request()->routeIs('rider.events') ? 'bg-[#2a527d]/10 text-[#2a527d]' : 'text-gray-700' }}">Events</a>
            <a href="{{ route('rider.my-events') }}" class="px-3 py-2 rounded-2xl hover:bg-gray-50 no-underline hover:no-underline {{ request()->routeIs('rider.my-events') ? 'bg-[#2a527d]/10 text-[#2a527d]' : 'text-gray-700' }}">My Events</a>
            <a href="{{ route('rider.blogs') }}" class="px-3 py-2 rounded-2xl hover:bg-gray-50 no-underline hover:no-underline {{ request()->routeIs('rider.blogs') ? 'bg-[#2a527d]/10 text-[#2a527d]' : 'text-gray-700' }}">Blogs</a>
            <a href="{{ route('rider.profile') }}" class="px-3 py-2 rounded-2xl hover:bg-gray-50 no-underline hover:no-underline {{ request()->routeIs('rider.profile') ? 'bg-[#2a527d]/10 text-[#2a527d]' : 'text-gray-700' }}">Profile</a>
        </nav>
    </div>
</aside>

<div class="lg:hidden" x-show="sidebarOpen" x-cloak>
    <div class="fixed inset-0 bg-black/40" @click="sidebarOpen = false"></div>

    <div class="fixed left-0 top-0 bottom-0 w-72 bg-white shadow-xl p-4">
        <div class="flex items-center justify-between">
            <div class="font-extrabold text-gray-900">Menu</div>
            <button type="button" class="h-10 w-10 inline-flex items-center justify-center rounded-xl border border-gray-200 hover:bg-gray-50" @click="sidebarOpen = false" aria-label="Close menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <nav class="mt-4 grid gap-2 text-sm font-semibold">
            <a href="{{ route('rider.dashboard') }}" class="px-3 py-2 rounded-2xl hover:bg-gray-50 no-underline hover:no-underline {{ request()->routeIs('rider.dashboard') ? 'bg-[#2a527d]/10 text-[#2a527d]' : 'text-gray-700' }}">Dashboard</a>
            <a href="{{ route('rider.events') }}" class="px-3 py-2 rounded-2xl hover:bg-gray-50 no-underline hover:no-underline {{ request()->routeIs('rider.events') ? 'bg-[#2a527d]/10 text-[#2a527d]' : 'text-gray-700' }}">Events</a>
            <a href="{{ route('rider.my-events') }}" class="px-3 py-2 rounded-2xl hover:bg-gray-50 no-underline hover:no-underline {{ request()->routeIs('rider.my-events') ? 'bg-[#2a527d]/10 text-[#2a527d]' : 'text-gray-700' }}">My Events</a>
            <a href="{{ route('rider.blogs') }}" class="px-3 py-2 rounded-2xl hover:bg-gray-50 no-underline hover:no-underline {{ request()->routeIs('rider.blogs') ? 'bg-[#2a527d]/10 text-[#2a527d]' : 'text-gray-700' }}">Blogs</a>
            <a href="{{ route('rider.profile') }}" class="px-3 py-2 rounded-2xl hover:bg-gray-50 no-underline hover:no-underline {{ request()->routeIs('rider.profile') ? 'bg-[#2a527d]/10 text-[#2a527d]' : 'text-gray-700' }}">Profile</a>
        </nav>
    </div>
</div>
