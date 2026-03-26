@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 font-sans p-4">
    <div class="flex flex-col md:flex-row-reverse w-full max-w-5xl bg-white rounded-lg shadow-2xl overflow-hidden min-h-[550px] animate__animated animate__fadeIn">
        <!-- Right Side: Branding/Info (Swapped and reduced) -->
        <div class="w-full md:w-5/12 bg-[#1e3a5f] p-8 text-white flex flex-col justify-center relative overflow-hidden animate__animated animate__fadeInRight animate__delay-1s order-2 md:order-1">
            <div class="absolute inset-0 opacity-20">
                <img src="https://images.unsplash.com/photo-1541625602330-2277a4c46182?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Cycling" class="w-full h-full object-cover mix-blend-overlay">
                <div class="absolute inset-0 bg-[#1e3a5f] opacity-60"></div>
            </div>
            
            <div class="relative z-10 text-center">
                <div class="mb-6 animate__animated animate__fadeInDown animate__delay-2s">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>

                <h1 class="text-3xl font-extrabold mb-2 tracking-tight text-white">
                    Cross Tanzania Cycling
                </h1>
                <p class="text-blue-200 text-xs font-semibold uppercase tracking-[0.2em] mb-6">
                    Cross Tanzania Cycling
                </p>
                
                <div class="space-y-4 text-blue-100 text-sm leading-relaxed max-w-xs mx-auto">
                    <p class="animate__animated animate__fadeInUp animate__delay-2s">
                        Uniting regions and communities through the power of cycling.
                    </p>
                    <div class="flex justify-center gap-4 pt-4 animate__animated animate__fadeIn animate__delay-3s">
                        <div class="text-center">
                            <span class="block font-bold text-xl">20+</span>
                            <span class="text-[10px] uppercase opacity-70">Regions</span>
                        </div>
                        <div class="w-px h-8 bg-blue-400 opacity-30"></div>
                        <div class="text-center">
                            <span class="block font-bold text-xl">500+</span>
                            <span class="text-[10px] uppercase opacity-70">Cyclists</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Left Side: Login Form (Swapped) -->
        <div class="w-full md:w-7/12 p-8 md:p-10 flex flex-col justify-center relative bg-[#f8f9fa] animate__animated animate__fadeInLeft order-1 md:order-2">
            <!-- Home Button -->
            <div class="absolute top-6 right-6">
                <a href="{{ url('/') }}" class="bg-[#c53030] hover:bg-[#a22828] text-white px-3 py-1.5 rounded text-xs font-bold uppercase shadow transition-all flex items-center gap-1 no-underline hover:no-underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Home
                </a>
            </div>

            <div class="max-w-sm mx-auto w-full">
                <!-- Logo -->
                <div class="flex justify-center mb-4 animate__animated animate__zoomIn">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Coat_of_arms_of_Tanzania.svg/1200px-Coat_of_arms_of_Tanzania.svg.png" alt="Tanzania Logo" class="h-24 object-contain">
                </div>

                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6 uppercase tracking-wider">Login</h2>

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf
                    
                    <div class="space-y-3">
                        <div class="relative animate__animated animate__fadeInUp animate__delay-1s">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                class="w-full px-4 py-2.5 bg-[#d1dce8] border-2 border-transparent focus:border-blue-500 rounded text-sm text-gray-800 placeholder-gray-500 outline-none transition-all @error('email') border-red-500 @enderror"
                                placeholder="Email Address">
                            @error('email')
                                <span class="text-red-500 text-[10px] mt-1 block font-semibold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="relative animate__animated animate__fadeInUp animate__delay-1s">
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                class="w-full px-4 py-2.5 bg-[#d1dce8] border-2 border-transparent focus:border-blue-500 rounded text-sm text-gray-800 placeholder-gray-500 outline-none transition-all @error('password') border-red-500 @enderror"
                                placeholder="Password">
                            @error('password')
                                <span class="text-red-500 text-[10px] mt-1 block font-semibold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-[#2a527d] hover:bg-[#1e3a5f] text-white font-bold py-2.5 rounded shadow transition-all text-sm no-underline hover:no-underline animate__animated animate__pulse animate__infinite animate__slow">
                        Login
                    </button>

                    <div class="text-center animate__animated animate__fadeIn animate__delay-2s">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-800 font-semibold text-xs no-underline hover:underline">
                                Forgot Password?
                            </a>
                        @endif
                    </div>

                    <div class="pt-4 border-t border-gray-300 text-center animate__animated animate__fadeIn animate__delay-2s">
                        <p class="text-gray-600 text-xs">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="text-[#2d6a4f] hover:text-[#1b4332] font-bold no-underline hover:underline">Register Here</a>
                        </p>
                    </div>

                    <div class="text-center pt-6 text-[10px] text-gray-500 font-medium animate__animated animate__fadeInUp animate__delay-4s">
                        Copyright © 2026. <span class="text-[#2a527d] font-bold">Cross Tanzania Cycling</span> - All Rights Reserved
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
