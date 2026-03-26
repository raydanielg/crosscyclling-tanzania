<header class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm print:hidden">
    <div class="px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <button type="button" class="lg:hidden p-2 text-gray-500 hover:bg-gray-100 rounded-lg" @click="sidebarOpen = !sidebarOpen">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="flex items-center gap-2">
                <span class="bg-red-600 text-white px-2 py-1 rounded text-xs font-black tracking-tighter">ADMIN</span>
                <span class="text-sm font-bold text-gray-900 hidden sm:block">Cross Tanzania Cycling</span>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="flex flex-col items-end hidden sm:flex">
                <span class="text-sm font-bold text-gray-900">{{ auth()->user()->name }}</span>
                <span class="text-[10px] font-black uppercase text-red-600 tracking-widest">Super Admin</span>
            </div>
            <div class="h-10 w-10 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center text-gray-400 font-bold">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="p-2 text-gray-400 hover:text-red-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</header>
