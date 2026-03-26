<footer class="bg-gray-950 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="h-12 w-auto rounded-xl bg-white/95 p-2 ring-1 ring-white/10">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-8 w-auto object-contain" />
                    </div>
                </div>
                <p class="text-sm text-gray-300 leading-relaxed">
                    Connecting Tanzania through cycling. Manage events, riders, sponsors, volunteers and community content in one platform.
                </p>
            </div>

            <div class="space-y-3">
                <div class="font-bold">Quick Links</div>
                <div class="grid gap-2 text-sm">
                    <a href="{{ route('about') }}" class="text-gray-300 hover:text-white no-underline hover:no-underline">About</a>
                    <a href="{{ route('events') }}" class="text-gray-300 hover:text-white no-underline hover:no-underline">Events</a>
                    <a href="{{ route('blog.index') }}" class="text-gray-300 hover:text-white no-underline hover:no-underline">Blog</a>
                    <a href="{{ route('partners') }}" class="text-gray-300 hover:text-white no-underline hover:no-underline">Partners</a>
                    <a href="{{ route('contact') }}" class="text-gray-300 hover:text-white no-underline hover:no-underline">Contact</a>
                </div>
            </div>

            <div class="space-y-3">
                <div class="font-bold">Support</div>
                <div class="grid gap-2 text-sm">
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white no-underline hover:no-underline">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-300 hover:text-white no-underline hover:no-underline">Register</a>
                    <a href="{{ route('password.request') }}" class="text-gray-300 hover:text-white no-underline hover:no-underline">Forgot Password</a>
                </div>
            </div>

            <div class="space-y-3">
                <div class="font-bold">Contact</div>
                <div class="text-sm text-gray-300 space-y-2">
                    <div>Mwanza, Tanzania</div>
                    <div>Email: info@crosstzcycling.co.tz</div>
                    <div>Phone: +255 744 428 449</div>
                </div>
            </div>
        </div>

        <div class="mt-10 pt-6 border-t border-white/10 flex flex-col sm:flex-row gap-3 items-center justify-between text-xs text-gray-400">
            <div>Copyright © 2026. <span class="text-white font-bold">CTCMS</span> - All Rights Reserved</div>
            <div class="flex items-center gap-4">
                <a href="#" class="hover:text-white no-underline hover:no-underline">Privacy</a>
                <a href="#" class="hover:text-white no-underline hover:no-underline">Terms</a>
            </div>
        </div>
    </div>
</footer>
