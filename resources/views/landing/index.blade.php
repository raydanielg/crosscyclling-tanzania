@extends('landing.layout')

@section('title', 'Cross Tanzania Cycling - One Cycling Community')

@section('body')
@include('landing.partials.header')

<main>
    {{-- Hero Section --}}
    <section
        x-data="{
            i: 0,
            w: 0,
            timer: null,
            words: ['Management System', 'Cycling Sports Promotion', 'Events & Registration', 'Riders Community', 'Sponsors & Partners', 'News & Highlights'],
            images: [
                '{{ asset('images/Highlights/DEE_1095.jpg') }}',
                '{{ asset('images/Highlights/DEE_1146.jpg') }}',
                '{{ asset('images/Highlights/DEE_1156.jpg') }}',
                '{{ asset('images/Highlights/DEE_1208.jpg') }}',
                '{{ asset('images/Highlights/DEE_1131.jpg') }}',
                '{{ asset('images/Highlights/DEE_1116.jpg') }}'
            ],
            init() {
                this.timer = setInterval(() => {
                    this.i = (this.i + 1) % this.images.length;
                    this.w = (this.w + 1) % this.words.length;
                }, 5000);
            }
        }"
        class="relative overflow-hidden min-h-[90vh] flex items-center bg-[#0f2d4d]"
    >
        {{-- Hero Background Images --}}
        <div class="absolute inset-0">
            <template x-for="(src, idx) in images" :key="idx">
                <img
                    :src="src"
                    alt="Cycling Tanzania"
                    class="absolute inset-0 w-full h-full object-cover"
                    x-show="i === idx"
                    x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="opacity-0 scale-110"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-1000"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-105"
                    x-cloak
                />
            </template>
            <div class="absolute inset-0 bg-gradient-to-r from-[#0f2d4d]/90 via-[#0f2d4d]/60 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#0f2d4d]/40"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="max-w-3xl" data-aos="fade-right" data-aos-duration="1000">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs sm:text-sm font-bold text-blue-200 mb-6">
                    <span class="flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                    </span>
                    One Cycling Community
                </div>
                
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-poppins font-black text-white leading-[1.1] mb-6">
                    Cross Tanzania <br/>
                    <span class="text-blue-400" x-text="words[w]" x-transition></span>
                </h1>
                
                <p class="text-white/80 text-lg sm:text-xl leading-relaxed mb-10 max-w-2xl">
                    A complete digital platform designed to manage events registration, riders, sponsors, volunteers, and cycling data tracking across Tanzania.
                </p>
                
                <div class="flex flex-wrap gap-4 mb-12">
                    <a href="{{ route('register') }}" class="group inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-[#c53030] text-white font-black shadow-xl shadow-red-900/20 hover:bg-[#a22828] hover:-translate-y-1 transition-all duration-300 no-underline hover:no-underline">
                        Get Started Free
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg>
                    </a>
                    <a href="{{ route('events') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-white/10 backdrop-blur-md border border-white/20 text-white font-bold hover:bg-white/20 transition-all duration-300 no-underline hover:no-underline">
                        Explore Events
                    </a>
                </div>

                <div class="grid grid-cols-3 gap-8 border-t border-white/10 pt-10">
                    <div>
                        <div class="text-3xl font-black text-white">20+</div>
                        <div class="text-xs uppercase tracking-widest text-white/50 font-bold mt-1">Regions</div>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-white">500+</div>
                        <div class="text-xs uppercase tracking-widest text-white/50 font-bold mt-1">Cyclists</div>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-white">100+</div>
                        <div class="text-xs uppercase tracking-widest text-white/50 font-bold mt-1">Events</div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Scroll Indicator --}}
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-white/40 animate-bounce">
            <span class="text-[10px] uppercase tracking-[0.2em] font-bold">Scroll</span>
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" /></svg>
        </div>
    </section>

    {{-- Welcome Note Section --}}
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-gray-50/50 -skew-x-12 translate-x-1/2"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative" data-aos="fade-right">
                    <div class="absolute -inset-4 bg-[#2a527d]/5 rounded-[3rem] rotate-3"></div>
                    <div class="relative">
                        <div class="absolute -top-6 -left-6 w-24 h-24 bg-[#c53030]/10 rounded-full blur-2xl"></div>
                        <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl ring-8 ring-white">
                            <img src="{{ asset('CEO.jpeg') }}" alt="CTCMS Founder" class="w-full h-auto object-cover" />
                            <div class="absolute bottom-0 inset-x-0 p-8 bg-gradient-to-t from-[#0f2d4d] to-transparent">
                                <div class="text-white font-black text-xl">Founder & CEO</div>
                                <div class="text-white/70 text-sm font-medium">Cross Tanzania Cycling</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-8" data-aos="fade-left">
                    <div>
                        <div class="text-[#2a527d] font-black text-sm uppercase tracking-widest mb-3">Welcome Note</div>
                        <h2 class="text-4xl sm:text-5xl font-poppins font-black text-gray-900 leading-tight">
                            Karibu <span class="text-[#2a527d]">CTCMS</span> <br/>
                            Tanzania
                        </h2>
                    </div>

                    <div class="space-y-6 text-gray-600 text-lg leading-relaxed">
                        <p>
                            Tunakukaribisha kwenye jukwaa letu rasmi la kuunganisha jamii ya waendesha baiskeli Tanzania. 
                            Hapa unapata taarifa, matukio, na mfumo wa kisasa wa usimamizi wa shughuli za baiskeli.
                        </p>
                        <p class="font-medium text-gray-900 border-l-4 border-[#2a527d] pl-6 py-2 italic bg-gray-50 rounded-r-xl">
                            "CTCMS imejengwa kurahisisha usajili wa matukio, uendeshaji wa mashindano, usimamizi wa wanachama, na wadau—kwa mfumo salama na wa kisasa."
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="{{ route('about') }}" class="px-8 py-3 rounded-xl bg-[#2a527d] text-white font-bold shadow-lg shadow-blue-900/20 hover:bg-[#1e3a5f] hover:-translate-y-0.5 transition-all no-underline hover:no-underline">
                            Learn More
                        </a>
                        <a href="{{ route('register') }}" class="px-8 py-3 rounded-xl border-2 border-gray-200 text-gray-900 font-bold hover:bg-gray-50 transition-all no-underline hover:no-underline">
                            Join Community
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="about" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
                <div class="text-[#2a527d] font-black text-sm uppercase tracking-widest mb-4">Why CTCMS?</div>
                <h2 class="text-4xl font-poppins font-black text-gray-900 mb-6">Built for the Cycling Community</h2>
                <p class="text-gray-600 text-lg">Tunarahisisha kila hatua ya michezo ya baiskeli Tanzania kwa kutumia teknolojia ya kisasa.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $features = [
                        [
                            'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z',
                            'title' => 'Secure Accounts',
                            'desc' => 'Role-based access kwa kila aina ya mtumiaji—Rider, Admin, Sponsor.',
                            'color' => 'blue'
                        ],
                        [
                            'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                            'title' => 'Events Manager',
                            'desc' => 'Ratiba, usajili, na uendeshaji wa matukio kwa wepesi zaidi.',
                            'color' => 'red'
                        ],
                        [
                            'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                            'title' => 'Community',
                            'desc' => 'Ungana na maelfu ya waendesha baiskeli nchi nzima.',
                            'color' => 'green'
                        ],
                        [
                            'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                            'title' => 'Analytics',
                            'desc' => 'Pata ripoti na takwimu sahihi za matukio na wanachama.',
                            'color' => 'purple'
                        ]
                    ];
                @endphp

                @foreach($features as $idx => $f)
                <div class="group p-8 rounded-[2rem] bg-white border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
                    <div class="w-14 h-14 rounded-2xl bg-{{ $f['color'] }}-50 flex items-center justify-center text-{{ $f['color'] }}-600 mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $f['icon'] }}" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-black text-gray-900 mb-3">{{ $f['title'] }}</h3>
                    <p class="text-gray-500 leading-relaxed">{{ $f['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Events Section --}}
    <section id="events" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-end justify-between gap-6 mb-12">
                <div class="max-w-2xl" data-aos="fade-right">
                    <div class="text-[#2a527d] font-black text-sm uppercase tracking-widest mb-3">Live Events</div>
                    <h2 class="text-4xl font-poppins font-black text-gray-900 leading-tight">Upcoming rides & competitions</h2>
                </div>
                <a href="{{ route('events') }}" class="px-6 py-3 rounded-xl bg-gray-900 text-white font-bold hover:bg-black transition-all no-underline hover:no-underline" data-aos="fade-left">
                    View All Events
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($events as $idx => $event)
                    @php
                        $status = strtolower((string) $event->status);
                        $appStatus = strtolower((string) $event->application_status);
                        
                        $statusLabel = strtoupper($status ?: 'PLANNED');
                        $statusColor = match ($status) {
                            'open' => 'bg-green-500 text-white',
                            'closed' => 'bg-red-500 text-white',
                            default => 'bg-amber-500 text-white',
                        };
                    @endphp

                    <div class="group flex flex-col h-full rounded-[2.5rem] overflow-hidden border border-gray-100 bg-white shadow-sm hover:shadow-2xl transition-all duration-500" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ $event->image_path ? asset($event->image_path) : asset('images/hero-cycling.jpg') }}" alt="{{ $event->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            
                            <div class="absolute top-4 left-4 right-4 flex justify-between">
                                <span class="px-3 py-1 rounded-lg text-[10px] font-black tracking-widest {{ $statusColor }} shadow-lg shadow-black/20">
                                    {{ $statusLabel }}
                                </span>
                                @if($appStatus === 'open')
                                <span class="px-3 py-1 rounded-lg bg-white/20 backdrop-blur-md text-white text-[10px] font-black tracking-widest border border-white/30">
                                    APPLICATIONS OPEN
                                </span>
                                @endif
                            </div>

                            <div class="absolute bottom-6 left-6 right-6">
                                <div class="text-white font-black text-2xl group-hover:text-blue-300 transition-colors">{{ $event->name }}</div>
                                <div class="flex items-center gap-2 text-white/80 text-sm mt-1">
                                    <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                    {{ $event->location }}
                                </div>
                            </div>
                        </div>

                        <div class="p-8 flex flex-col flex-1">
                            <p class="text-gray-600 text-sm leading-relaxed mb-6 line-clamp-3">
                                {{ $event->description }}
                            </p>

                            <div class="grid grid-cols-2 gap-4 mb-8">
                                <div class="p-3 rounded-2xl bg-gray-50 border border-gray-100">
                                    <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Distance</div>
                                    <div class="text-sm font-black text-gray-900">{{ $event->distance_km ?: 'TBA' }} KM</div>
                                </div>
                                <div class="p-3 rounded-2xl bg-gray-50 border border-gray-100">
                                    <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Slots Left</div>
                                    <div class="text-sm font-black text-gray-900">{{ $event->slots_remaining ?: $event->slots_total ?: 'TBA' }}</div>
                                </div>
                            </div>

                            <div class="mt-auto pt-6 border-t border-gray-50 flex items-center justify-between">
                                <div class="text-xs text-gray-400 font-bold">
                                    {{ $event->starts_at ? $event->starts_at->format('M d, Y') : 'TBA' }}
                                </div>
                                
                                @if (Auth::check() && in_array($event->id, $appliedEventIds))
                                    <span class="px-6 py-2 rounded-xl bg-blue-50 text-[#2a527d] text-xs font-black">Applied</span>
                                @elseif ($status === 'open' && $appStatus === 'open')
                                    <a href="{{ route('rider.apply.step1', $event) }}" class="px-6 py-2 rounded-xl bg-[#2a527d] text-white text-xs font-black shadow-lg shadow-blue-900/10 hover:bg-[#1e3a5f] hover:-translate-y-0.5 transition-all no-underline hover:no-underline">Apply Now</a>
                                @else
                                    <span class="px-6 py-2 rounded-xl bg-gray-100 text-gray-400 text-xs font-black">Closed</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-gray-400 font-bold">No upcoming events at the moment.</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Blog Section --}}
    <section id="blog" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-end justify-between gap-6 mb-12">
                <div class="max-w-2xl" data-aos="fade-right">
                    <div class="text-[#2a527d] font-black text-sm uppercase tracking-widest mb-3">News & Updates</div>
                    <h2 class="text-4xl font-poppins font-black text-gray-900 leading-tight">Latest from our community</h2>
                </div>
                <a href="{{ route('blog.index') }}" class="px-6 py-3 rounded-xl border-2 border-gray-200 text-gray-900 font-bold hover:bg-white transition-all no-underline hover:no-underline" data-aos="fade-left">
                    Read More Articles
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($blogPosts as $idx => $post)
                    <a href="{{ route('blog.show', $post->slug) }}" class="group flex flex-col h-full rounded-[2.5rem] overflow-hidden bg-white shadow-sm hover:shadow-2xl transition-all duration-500 no-underline hover:no-underline" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ $post->image_path ? asset($post->image_path) : asset('images/blog/default.jpg') }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                        </div>
                        <div class="p-8 flex flex-col flex-1">
                            <div class="text-[10px] font-black text-[#2a527d] uppercase tracking-widest mb-3">
                                {{ optional($post->published_at)->format('M d, Y') ?: 'Recent' }}
                            </div>
                            <h3 class="text-xl font-black text-gray-900 mb-4 group-hover:text-[#2a527d] transition-colors leading-tight">
                                {{ $post->title }}
                            </h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-2">
                                {{ $post->excerpt }}
                            </p>
                            <div class="mt-auto flex items-center gap-2 text-sm font-black text-gray-900 group-hover:translate-x-2 transition-transform">
                                Read Story
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Partners Section --}}
    <section id="partners" class="py-24 bg-white border-y border-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="text-gray-400 font-black text-[10px] uppercase tracking-[0.3em] mb-4">Supported By</div>
                <h2 class="text-2xl font-black text-gray-900">Sponsors & Partners</h2>
            </div>

            <div class="flex flex-wrap justify-center gap-8 md:gap-16 opacity-60 hover:opacity-100 transition-opacity duration-500">
                @php
                    $partners = [
                        ['src' => 'images/partners/BankOfTanzania_logo.svg', 'alt' => 'Bank of Tanzania'],
                        ['src' => 'images/partners/TANESCO LOGO.jpg', 'alt' => 'TANESCO'],
                        ['src' => 'images/partners/TPA Logo_bg_white.png', 'alt' => 'TPA'],
                        ['src' => 'images/partners/airport.png', 'alt' => 'Airport'],
                        ['src' => 'images/partners/tamesa.png', 'alt' => 'TAMESA'],
                    ];
                @endphp

                @foreach ($partners as $p)
                    <div class="h-12 md:h-16 grayscale hover:grayscale-0 transition-all duration-300">
                        <img src="{{ asset($p['src']) }}" alt="{{ $p['alt'] }}" class="h-full w-auto object-contain" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Testimonials Section --}}
    <section class="py-24 bg-[#0f2d4d] relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-[#0f2d4d] via-[#1e3a5f] to-[#2a527d] opacity-50"></div>
        <div class="absolute top-0 left-0 w-64 h-64 bg-blue-500/10 rounded-full blur-[100px] -translate-x-1/2 -translate-y-1/2"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative" x-data="{
            t: 0,
            items: [
                {
                    quote: 'Nilianza kama beginner, lakini jamii hapa imekuwa supportive sana. Sasa nimekamilisha challenges kubwa tatu!',
                    name: 'Anna Mollel',
                    role: 'Amateur Rider'
                },
                {
                    quote: 'CTCMS imerahisisha usajili wa matukio na uendeshaji wa ushindani. Kila kitu kiko organized na salama.',
                    name: 'Juma Ramadhan',
                    role: 'Event Coordinator'
                },
                {
                    quote: 'Kwa wadau na sponsors, mfumo umetupa uwazi wa ushirikiano na taarifa za matukio kwa wakati.',
                    name: 'S. Masanja',
                    role: 'Partner'
                }
            ],
            init() {
                setInterval(() => { this.t = (this.t + 1) % this.items.length }, 6000)
            }
        }">
            <div class="max-w-4xl mx-auto text-center">
                <div class="text-blue-400 font-black text-sm uppercase tracking-widest mb-12">Community Feedback</div>
                
                <div class="relative h-64 sm:h-48">
                    <template x-for="(it, idx) in items" :key="idx">
                        <div
                            x-show="t === idx"
                            x-transition:enter="transition ease-out duration-700"
                            x-transition:enter-start="opacity-0 translate-y-8"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-300 absolute inset-0"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-8"
                            x-cloak
                        >
                            <p class="text-2xl sm:text-3xl font-poppins font-medium text-white leading-relaxed italic">
                                &ldquo;<span x-text="it.quote"></span>&rdquo;
                            </p>
                            <div class="mt-8">
                                <div class="text-xl font-black text-white" x-text="it.name"></div>
                                <div class="text-sm font-bold text-blue-400 uppercase tracking-widest mt-1" x-text="it.role"></div>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="mt-12 flex justify-center gap-3">
                    <template x-for="(it, idx) in items" :key="'dot_' + idx">
                        <button
                            @click="t = idx"
                            class="h-1.5 transition-all duration-300 rounded-full"
                            :class="t === idx ? 'w-8 bg-blue-400' : 'w-2 bg-white/20'"
                        ></button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact / Newsletter --}}
    <section id="contact" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-[3rem] bg-gray-900 overflow-hidden relative shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-r from-[#0f2d4d] to-transparent opacity-80"></div>
                
                <div class="relative grid grid-cols-1 lg:grid-cols-2 items-center">
                    <div class="p-10 sm:p-20">
                        <div class="text-blue-400 font-black text-sm uppercase tracking-widest mb-6" data-aos="fade-up">Newsletter</div>
                        <h2 class="text-4xl sm:text-5xl font-poppins font-black text-white mb-8" data-aos="fade-up" data-aos-delay="100">Stay in the loop</h2>
                        <p class="text-white/70 text-lg mb-10" data-aos="fade-up" data-aos-delay="200">
                            Pata taarifa za events mpya, community rides, na updates za CTCMS moja kwa moja kwenye inbox yako.
                        </p>

                        <form class="flex flex-col sm:flex-row gap-3 max-w-lg" data-aos="fade-up" data-aos-delay="300">
                            <input type="email" placeholder="Your email address" class="flex-1 px-6 py-4 rounded-xl bg-white/10 border border-white/20 text-white placeholder:text-white/40 focus:ring-2 focus:ring-blue-500 outline-none backdrop-blur-md">
                            <button type="button" class="px-8 py-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-black transition-all shadow-xl shadow-blue-900/20 whitespace-nowrap">
                                Subscribe
                            </button>
                        </form>
                        <p class="mt-4 text-xs text-white/40 font-bold uppercase tracking-widest">No spam. Only cycling goodness.</p>
                    </div>

                    <div class="hidden lg:block relative h-full min-h-[500px]">
                        <img src="{{ asset('images/Highlights/DEE_1219.jpg') }}" alt="Cycling Event" class="absolute inset-0 w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-l from-transparent to-gray-900"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('landing.partials.footer')
@endsection
