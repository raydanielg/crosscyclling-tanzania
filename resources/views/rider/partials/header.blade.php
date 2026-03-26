<header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <button type="button" class="lg:hidden inline-flex items-center justify-center h-10 w-10 rounded-xl border border-gray-200 bg-white hover:bg-gray-50" @click="sidebarOpen = !sidebarOpen" aria-label="Open menu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <a href="{{ url('/') }}" class="inline-flex items-center gap-3 no-underline hover:no-underline">
                    <span class="inline-flex items-center justify-center rounded-2xl bg-white shadow ring-1 ring-gray-200 p-2">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-9 w-auto object-contain drop-shadow-sm" />
                    </span>
                </a>
            </div>

            <div class="flex items-center gap-3">
                <div class="hidden sm:block text-right">
                    <div class="text-sm font-extrabold text-gray-900">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-gray-500">{{ auth()->user()->email }}</div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-gray-900 text-white text-sm font-extrabold shadow hover:bg-black">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
