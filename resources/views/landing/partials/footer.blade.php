<footer class="bg-[#0f172a] text-white overflow-hidden relative pt-20 pb-10">
    {{-- Decorative Background --}}
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500/5 rounded-full blur-[100px] translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-red-500/5 rounded-full blur-[80px] -translate-x-1/2 translate-y-1/2"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8">
            {{-- Brand Section --}}
            <div class="lg:col-span-4 space-y-8" data-aos="fade-up">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-3 no-underline">
                    <div class="h-14 w-auto rounded-2xl bg-white p-2.5 shadow-xl ring-1 ring-white/10">
                        <img src="{{ asset('logo.png') }}" alt="CTCMS Logo" class="h-full w-auto object-contain" />
                    </div>
                    <span class="font-poppins font-black text-xl tracking-tight text-white">
                        Cross<span class="text-blue-400">Tanzania</span>
                    </span>
                </a>
                
                <p class="text-slate-400 text-base leading-relaxed max-w-sm">
                    Connecting Tanzania through cycling. Manage events, riders, sponsors, and community content in one modern digital platform.
                </p>

                <div class="flex items-center gap-4">
                    <a href="#" class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-[#2a527d] hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-[#1DA1F2] hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-[#E4405F] hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Links Sections --}}
            <div class="lg:col-span-2 space-y-8" data-aos="fade-up" data-aos-delay="100">
                <h4 class="font-poppins font-black text-white text-sm uppercase tracking-widest">Platform</h4>
                <ul class="space-y-4 text-slate-400 text-sm font-bold">
                    <li><a href="{{ route('about') }}" class="hover:text-blue-400 transition-colors no-underline">About Us</a></li>
                    <li><a href="{{ route('events') }}" class="hover:text-blue-400 transition-colors no-underline">Events</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-blue-400 transition-colors no-underline">Community Blog</a></li>
                    <li><a href="{{ route('partners') }}" class="hover:text-blue-400 transition-colors no-underline">Partners</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-blue-400 transition-colors no-underline">Contact</a></li>
                </ul>
            </div>

            <div class="lg:col-span-2 space-y-8" data-aos="fade-up" data-aos-delay="200">
                <h4 class="font-poppins font-black text-white text-sm uppercase tracking-widest">Support</h4>
                <ul class="space-y-4 text-slate-400 text-sm font-bold">
                    <li><a href="{{ route('login') }}" class="hover:text-blue-400 transition-colors no-underline">Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-blue-400 transition-colors no-underline">Register</a></li>
                    <li><a href="{{ route('password.request') }}" class="hover:text-blue-400 transition-colors no-underline">Forgot Password</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition-colors no-underline">Help Center</a></li>
                </ul>
            </div>

            {{-- Contact Section --}}
            <div class="lg:col-span-4 space-y-8" data-aos="fade-up" data-aos-delay="300">
                <h4 class="font-poppins font-black text-white text-sm uppercase tracking-widest">Get In Touch</h4>
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 shrink-0">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div class="text-slate-400 text-sm leading-relaxed font-medium">
                            Mwanza, Tanzania <br/>
                            Main Street Plaza, 2nd Floor
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-green-500/10 border border-green-500/20 flex items-center justify-center text-green-400 shrink-0">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </div>
                        <div class="text-slate-400 text-sm leading-relaxed font-medium">
                            info@crosstzcycling.co.tz <br/>
                            support@crosstzcycling.co.tz
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 shrink-0">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        </div>
                        <div class="text-slate-400 text-sm leading-relaxed font-medium">
                            +255 744 428 449 <br/>
                            Mon - Fri, 8am - 5pm
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Footer --}}
        <div class="mt-20 pt-8 border-t border-slate-800/50 flex flex-col md:flex-row gap-6 items-center justify-between">
            <div class="text-slate-500 text-xs font-bold">
                Copyright © 2026 <span class="text-slate-300">CTCMS</span>. Designed for Tanzania's Cycling Community.
            </div>
            
            <div class="flex items-center gap-6">
                <a href="#" class="text-slate-500 hover:text-white text-xs font-bold no-underline transition-colors">Privacy Policy</a>
                <a href="#" class="text-slate-500 hover:text-white text-xs font-bold no-underline transition-colors">Terms of Service</a>
                <a href="#" class="text-slate-500 hover:text-white text-xs font-bold no-underline transition-colors">Sitemap</a>
            </div>
        </div>
    </div>
</footer>
