@extends('landing.layout')

@section('body')
@include('landing.partials.header')

<main>
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
                }, 4500);
            }
        }"
        class="relative overflow-hidden min-h-[85vh] sm:min-h-[90vh] bg-gradient-to-b from-[#0f2d4d] via-[#1e3a5f] to-[#2a527d] text-white"
    >
        <div class="absolute inset-0">
            <template x-for="(src, idx) in images" :key="src">
                <img
                    :src="src"
                    alt="Highlights"
                    class="absolute inset-0 w-full h-full object-cover"
                    x-show="i === idx"
                    x-transition:enter="transition ease-out duration-700"
                    x-transition:enter-start="opacity-0 scale-[1.02]"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-700"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    x-cloak
                />
            </template>
            <div class="absolute inset-0 bg-gradient-to-b from-[#0f2d4d]/70 via-[#1e3a5f]/70 to-[#2a527d]/65 backdrop-blur-[1px]"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="min-h-[85vh] sm:min-h-[90vh] flex items-center">
                <div class="space-y-6 max-w-3xl">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 text-sm font-semibold">
                        <span class="h-2 w-2 rounded-full bg-green-400"></span>
                        Tanzania Cycling Platform
                    </div>
                    <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-tight">
                        Cross Tanzania Cycling
                        <span
                            class="block text-blue-200"
                            x-text="words[w]"
                            x-transition
                            x-cloak
                        ></span>
                    </h1>
                    <p class="text-white/90 text-lg leading-relaxed max-w-xl">
                        A complete digital platform designed to manage events registration, riders, sponsors, volunteers, content, and data tracking across Tanzania.
                    </p>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 sm:px-6 py-2.5 sm:py-3 rounded-md bg-[#c53030] text-white text-sm sm:text-base font-extrabold shadow hover:bg-[#a22828] no-underline hover:no-underline whitespace-nowrap">
                            Get Started
                        </a>
                        <a href="{{ route('events') }}" class="inline-flex items-center justify-center px-4 sm:px-6 py-2.5 sm:py-3 rounded-md bg-white/15 border border-white/25 text-white text-sm sm:text-base font-bold hover:bg-white/20 backdrop-blur no-underline hover:no-underline whitespace-nowrap">
                            Explore Events
                        </a>
                    </div>
                    <div class="grid grid-cols-3 gap-6 pt-6 max-w-lg">
                        <div>
                            <div class="text-2xl font-extrabold">20+</div>
                            <div class="text-xs uppercase tracking-widest text-white/70">Regions</div>
                        </div>
                        <div>
                            <div class="text-2xl font-extrabold">500+</div>
                            <div class="text-xs uppercase tracking-widest text-white/70">Cyclists</div>
                        </div>
                        <div>
                            <div class="text-2xl font-extrabold">100+</div>
                            <div class="text-xs uppercase tracking-widest text-white/70">Events</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-14 sm:py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div class="flex justify-center lg:justify-start">
                    <div class="relative">
                        <div class="absolute -inset-6 rounded-full border-2 border-blue-400/40 animate-spin [animation-duration:10s]"></div>
                        <div class="absolute -inset-10 rounded-full border border-blue-300/25 animate-spin [animation-duration:16s] [animation-direction:reverse]"></div>
                        <div class="relative h-56 w-56 sm:h-64 sm:w-64 rounded-full ring-4 ring-white shadow-xl overflow-hidden border border-gray-200 bg-gray-100">
                            <img src="{{ asset('CEO.jpeg') }}" alt="Welcome" class="w-full h-full object-cover object-top" />
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Welcome Note</div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">
                        Karibu Cross Tanzania Cycling
                        <span class="text-[#2a527d]">Management System</span>
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-gray-700 leading-relaxed">
                        <p class="text-lg">
                            Tunakukaribisha kwenye jukwaa letu rasmi la kuunganisha jamii ya waendesha baiskeli Tanzania.
                            Hapa unapata taarifa, matukio, na mfumo wa kisasa wa usimamizi wa shughuli za baiskeli.
                        </p>
                        <p class="text-lg">
                            CTCMS imejengwa kurahisisha usajili wa matukio, uendeshaji wa mashindano, usimamizi wa wanachama,
                            wadau, na habari—kwa mfumo salama, wa kisasa, na unaoaminika.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="#about" class="inline-flex items-center justify-center px-6 py-3 rounded-md bg-[#2a527d] text-white font-extrabold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">
                            Learn More
                        </a>
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-md border border-gray-300 text-gray-900 font-extrabold hover:bg-gray-50 no-underline hover:no-underline">
                            Join the Community
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section
        id="about"
        x-data="{
            a: 0,
            timer: null,
            images: [
                '{{ asset('images/Highlights/DEE_0975.jpg') }}',
                '{{ asset('images/Highlights/DEE_1006.jpg') }}',
                '{{ asset('images/Highlights/DEE_1029.jpg') }}',
                '{{ asset('images/Highlights/DEE_1048.jpg') }}',
                '{{ asset('images/Highlights/DEE_1089.jpg') }}',
                '{{ asset('images/Highlights/DEE_1148.jpg') }}',
                '{{ asset('images/Highlights/DEE_1154.jpg') }}',
                '{{ asset('images/Highlights/DEE_1219.jpg') }}'
            ],
            init() {
                this.timer = setInterval(() => {
                    this.a = (this.a + 1) % this.images.length;
                }, 4200);
            }
        }"
        class="py-16 bg-gradient-to-b from-white via-white to-gray-50"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6" data-aos="fade-up">
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">About Cross Tanzania Cycling</div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">
                        Cross Tanzania.
                        <span class="text-[#2a527d]">One Cycling Community.</span>
                    </h2>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        CTCMS ni mfumo wa kisasa wa kusimamia shughuli za baiskeli Tanzania—kuanzia usajili wa matukio,
                        usimamizi wa wanachama, wadau, hadi taarifa na takwimu.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="p-5 rounded-2xl bg-white border border-gray-200 shadow-sm" data-aos="fade-up" data-aos-delay="100">
                            <div class="flex items-start gap-3">
                                <div class="mt-1 h-9 w-9 rounded-xl bg-[#2a527d] text-white flex items-center justify-center font-extrabold">S</div>
                                <div>
                                    <div class="font-extrabold text-gray-900">Secure Accounts</div>
                                    <div class="text-sm text-gray-600 mt-1">Role-based access kwa kila aina ya mtumiaji.</div>
                                </div>
                            </div>
                        </div>
                        <div class="p-5 rounded-2xl bg-white border border-gray-200 shadow-sm" data-aos="fade-up" data-aos-delay="150">
                            <div class="flex items-start gap-3">
                                <div class="mt-1 h-9 w-9 rounded-xl bg-[#c53030] text-white flex items-center justify-center font-extrabold">E</div>
                                <div>
                                    <div class="font-extrabold text-gray-900">Events Management</div>
                                    <div class="text-sm text-gray-600 mt-1">Ratiba, usajili, na uendeshaji wa matukio.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-gray-200 bg-white p-5" data-aos="fade-up" data-aos-delay="200">
                        <div class="font-extrabold text-gray-900">What you get</div>
                        <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm text-gray-700">
                            <div class="flex items-start gap-2">
                                <span class="mt-1 h-2 w-2 rounded-full bg-[#2a527d]"></span>
                                <div>Usajili wa wanachama na usimamizi wa profiles</div>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="mt-1 h-2 w-2 rounded-full bg-[#2a527d]"></span>
                                <div>Ufuatiliaji wa wadau: sponsors & partners</div>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="mt-1 h-2 w-2 rounded-full bg-[#2a527d]"></span>
                                <div>Habari, matangazo na gallery ya matukio</div>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="mt-1 h-2 w-2 rounded-full bg-[#2a527d]"></span>
                                <div>Takwimu na ripoti kwa maamuzi sahihi</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative" data-aos="fade-left">
                    <div class="absolute -inset-6 bg-gradient-to-br from-[#2a527d]/10 via-transparent to-[#c53030]/10 blur-2xl"></div>
                    <div class="relative grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-7">
                            <div class="rounded-3xl overflow-hidden border border-gray-200 shadow-lg bg-gray-100">
                                <template x-for="(src, idx) in images" :key="src">
                                    <img
                                        :src="src"
                                        alt="Highlights"
                                        class="w-full h-80 sm:h-96 object-cover"
                                        x-show="a === idx"
                                        x-transition:enter="transition ease-out duration-700"
                                        x-transition:enter-start="opacity-0 scale-[1.02]"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-700"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                    />
                                </template>
                            </div>
                        </div>

                        <div class="col-span-12 sm:col-span-5 grid gap-4">
                            <div class="rounded-3xl border border-gray-200 bg-white p-5 shadow-sm">
                                <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Highlights</div>
                                <div class="mt-2 text-xl font-extrabold text-gray-900">Cycling in Motion</div>
                                <div class="mt-2 text-sm text-gray-600">Picha zinabadilika automatically kuonyesha matukio na mafanikio ya jamii.</div>
                                <div class="mt-4 flex items-center gap-2">
                                    <template x-for="(src, idx) in images" :key="idx">
                                        <button
                                            type="button"
                                            class="h-2.5 w-2.5 rounded-full"
                                            :class="a === idx ? 'bg-[#2a527d]' : 'bg-gray-300 hover:bg-gray-400'"
                                            @click="a = idx"
                                            aria-label="Go to image"
                                        ></button>
                                    </template>
                                </div>
                            </div>

                            <div class="rounded-3xl overflow-hidden border border-gray-200 shadow-sm bg-gray-100">
                                <template x-for="(src, idx) in images" :key="src + '_mini'">
                                    <img
                                        :src="src"
                                        alt="Highlights"
                                        class="w-full h-48 object-cover"
                                        x-show="((a + 2) % images.length) === idx"
                                        x-transition:enter="transition ease-out duration-700"
                                        x-transition:enter-start="opacity-0"
                                        x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-700"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                    />
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="events" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-start md:items-end justify-between gap-6">
                <div>
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Events</div>
                    <h2 class="mt-2 text-3xl font-extrabold tracking-tight">Upcoming rides & competitions</h2>
                    <p class="mt-3 text-gray-600">Create events, register participants, and coordinate teams efficiently.</p>
                </div>
                @guest
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md bg-[#2a527d] text-white font-bold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">Register to Join</a>
                @endguest
            </div>

            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($events as $event)
                    @php
                        $status = strtolower((string) $event->status);
                        $appStatus = strtolower((string) $event->application_status);

                        $statusLabel = strtoupper($status ?: 'PLANNED');
                        $statusColor = match ($status) {
                            'open' => 'bg-green-500/20 text-green-100 border-green-300/30',
                            'closed' => 'bg-red-500/20 text-red-100 border-red-300/30',
                            default => 'bg-amber-500/20 text-amber-100 border-amber-300/30',
                        };

                        $appLabel = match ($appStatus) {
                            'open' => 'Applications: Open',
                            'closed' => 'Applications: Closed',
                            default => 'Applications: Not Open',
                        };
                    @endphp

                    <div class="rounded-3xl overflow-hidden border border-gray-200 bg-white shadow-sm hover:shadow-md transition">
                        <div class="relative h-48">
                            <img src="{{ $event->image_path ? asset($event->image_path) : '' }}" alt="{{ $event->name }}" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0f2d4d]/90 via-[#1e3a5f]/45 to-transparent"></div>
                            <div class="absolute left-4 right-4 top-4 flex items-center justify-between gap-3">
                                <span class="px-3 py-1 rounded-full border text-xs font-extrabold {{ $statusColor }}">{{ $statusLabel }}</span>
                                <span class="px-3 py-1 rounded-full bg-white/15 text-white border border-white/20 text-xs font-bold">{{ $appLabel }}</span>
                            </div>
                            <div class="absolute left-4 right-4 bottom-4">
                                <div class="text-white font-extrabold text-lg">{{ $event->name }}</div>
                                <div class="text-white/85 text-xs font-semibold">
                                    {{ $event->location }}@if($event->route) ({{ $event->route }}) @endif
                                </div>
                                <div class="mt-2 flex flex-wrap gap-2">
                                    @if ($event->distance_km)
                                        <span class="px-3 py-1 rounded-full bg-white/15 text-white border border-white/20 text-xs font-extrabold">{{ $event->distance_km }} KM</span>
                                    @endif
                                    @if ($event->slots_total)
                                        <span class="px-3 py-1 rounded-full bg-white/15 text-white border border-white/20 text-xs font-bold">Nafasi: {{ $event->slots_total }}</span>
                                    @endif
                                    @if (!is_null($event->slots_remaining))
                                        <span class="px-3 py-1 rounded-full bg-white/15 text-white border border-white/20 text-xs font-bold">Zimebaki: {{ $event->slots_remaining }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="p-5">
                            <p class="text-sm text-gray-600 leading-relaxed">{{ $event->description }}</p>
                            <div class="mt-4 flex items-center justify-between gap-3">
                                <div class="text-xs text-gray-500 font-bold">Status: <span class="text-gray-800">{{ ucfirst($status ?: 'planned') }}</span></div>

                                @if (Auth::check() && in_array($event->id, $appliedEventIds))
                                    <span class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-blue-100 text-blue-700 text-xs font-extrabold shadow-sm">Applied</span>
                                @elseif ($status === 'open' && $appStatus === 'open')
                                    <a href="{{ route('rider.apply.step1', $event) }}" class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-[#2a527d] text-white text-xs font-extrabold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">Apply</a>
                                @elseif ($status === 'closed')
                                    <span class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-gray-100 text-gray-500 text-xs font-extrabold">Closed</span>
                                @else
                                    <span class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-gray-100 text-gray-500 text-xs font-extrabold">Coming Soon</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="blog" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-start md:items-end justify-between gap-6">
                <div>
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Blog</div>
                    <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900">News & Updates</h2>
                    <p class="mt-3 text-gray-600">Habari fupi, tips, na updates za Cross Tanzania Cycling na matukio ya baiskeli.</p>
                </div>
                <a href="{{ route('blog.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md bg-[#2a527d] text-white font-bold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">View Blog</a>
            </div>

            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($blogPosts as $post)
                    <a href="{{ route('blog.show', $post->slug) }}" class="group rounded-3xl overflow-hidden border border-gray-200 bg-white shadow-sm hover:shadow-md transition no-underline hover:no-underline flex flex-col h-full">
                        <div class="relative h-52">
                            <img src="{{ $post->image_path ? asset($post->image_path) : '' }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-[1.02] transition" />
                        </div>
                        <div class="p-5 flex-1 flex flex-col">
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">{{ optional($post->published_at)->format('M Y') }}</div>
                            <div class="mt-2 font-extrabold text-gray-900 text-lg leading-snug min-h-[56px]">{{ $post->title }}</div>
                            <p class="mt-2 text-sm text-gray-600 leading-relaxed min-h-[60px]">{{ $post->excerpt }}</p>
                            <div class="mt-4 text-sm font-extrabold text-[#2a527d]">Read More</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section id="partners" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto">
                <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Partners</div>
                <h2 class="mt-2 text-3xl font-extrabold tracking-tight">Sponsors & partners who support cycling</h2>
                <p class="mt-3 text-gray-600">Build long-term collaboration with organizations across Tanzania.</p>
            </div>

            <div class="mt-10 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-7 gap-4">
                @php
                    $partners = [
                        ['src' => 'images/partners/BankOfTanzania_logo.svg', 'alt' => 'Bank of Tanzania'],
                        ['src' => 'images/partners/TANESCO LOGO.jpg', 'alt' => 'TANESCO'],
                        ['src' => 'images/partners/TPA Logo_bg_white.png', 'alt' => 'TPA'],
                        ['src' => 'images/partners/airport.png', 'alt' => 'Airport'],
                        ['src' => 'images/partners/contractor registion board CRD.jfif', 'alt' => 'CRB'],
                        ['src' => 'images/partners/jeshi la wnachilogo.png', 'alt' => 'Jeshi la Wananchi'],
                        ['src' => 'images/partners/tamesa.png', 'alt' => 'TAMESA'],
                    ];
                @endphp

                @foreach ($partners as $p)
                    <div class="h-20 rounded-2xl bg-white border border-gray-200 shadow-sm flex items-center justify-center px-4 transition hover:shadow-md hover:-translate-y-0.5">
                        <img src="{{ asset($p['src']) }}" alt="{{ $p['alt'] }}" class="max-h-12 w-auto object-contain" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section
        x-data="{
            t: 0,
            timer: null,
            items: [
                {
                    quote: 'Nilianza kama beginner, lakini jamii hapa imekuwa supportive sana. Sasa nimekamilisha challenges kubwa tatu!',
                    name: 'Anna Mollel',
                    role: 'Amateur Rider'
                },
                {
                    quote: 'CTCMS imerahisisha usajili wa matukio na uendeshaji wa ushindani. Kila kitu kiko organized na salama.',
                    name: 'Event Organizer',
                    role: 'Coordinator'
                },
                {
                    quote: 'Kwa wadau na sponsors, mfumo umetupa uwazi wa ushirikiano na taarifa za matukio kwa wakati.',
                    name: 'Partner',
                    role: 'Sponsor'
                }
            ],
            init() {
                this.timer = setInterval(() => {
                    this.t = (this.t + 1) % this.items.length;
                }, 5500);
            },
            prev() {
                this.t = (this.t - 1 + this.items.length) % this.items.length;
            },
            next() {
                this.t = (this.t + 1) % this.items.length;
            }
        }"
        class="py-16 bg-gray-100"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto">
                <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Testimonials</div>
                <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900">What the community says</h2>
                <p class="mt-3 text-gray-600">Stories from riders, sponsors, and volunteers.</p>
            </div>

            <div class="mt-10 max-w-4xl mx-auto">
                <div class="rounded-3xl bg-gray-200/70 border border-gray-200 px-6 sm:px-12 py-12 text-center">
                    <div class="text-5xl text-gray-500/80 font-extrabold leading-none">“</div>

                    <template x-for="(it, idx) in items" :key="idx">
                        <div
                            x-show="t === idx"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            x-cloak
                        >
                            <p class="mt-4 text-xl sm:text-2xl font-extrabold text-gray-900 leading-relaxed">
                                <span x-text="it.quote"></span>
                            </p>

                            <div class="mt-8 flex items-center justify-center gap-3 text-gray-700">
                                <div class="h-10 w-10 rounded-full bg-gray-100 border border-gray-300 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div class="font-extrabold" x-text="it.name"></div>
                                <div class="h-4 w-px bg-gray-400"></div>
                                <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500" x-text="it.role"></div>
                            </div>
                        </div>
                    </template>

                    <div class="mt-10 flex items-center justify-center gap-6">
                        <button type="button" @click="prev()" class="h-11 w-11 rounded-full bg-gray-100 border border-gray-300 text-gray-700 hover:bg-white shadow-sm">
                            <span class="sr-only">Previous</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.707 15.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 111.414 1.414L8.414 10l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div class="flex items-center gap-2">
                            <template x-for="(it, idx) in items" :key="'dot_' + idx">
                                <button
                                    type="button"
                                    class="h-2.5 w-2.5 rounded-full"
                                    :class="t === idx ? 'bg-gray-700' : 'bg-gray-400/60 hover:bg-gray-500'"
                                    @click="t = idx"
                                    aria-label="Go to testimonial"
                                ></button>
                            </template>
                        </div>

                        <button type="button" @click="next()" class="h-11 w-11 rounded-full bg-gray-100 border border-gray-300 text-gray-700 hover:bg-white shadow-sm">
                            <span class="sr-only">Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.293a1 1 0 011.414 0l5-5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M7.293 5.707a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5-5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-950 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @php
                $galleryPreview = [
                    'images/Highlights/DEE_1095.jpg',
                    'images/Highlights/DEE_1146.jpg',
                    'images/Highlights/DEE_1156.jpg',
                    'images/Highlights/DEE_1208.jpg',
                    'images/Highlights/DEE_1131.jpg',
                    'images/Highlights/DEE_1116.jpg',
                    'images/Highlights/DEE_1029.jpg',
                    'images/Highlights/DEE_1154.jpg',
                    'images/Highlights/DEE_1219.jpg',
                ];
            @endphp

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <div class="text-xs font-extrabold uppercase tracking-widest text-blue-200">Gallery</div>
                    <h2 class="mt-2 text-3xl font-extrabold tracking-tight">Cycling moments across Tanzania</h2>
                    <p class="mt-3 text-white/80">A place to showcase rides, events, and community achievements.</p>

                    <div class="mt-6">
                        <a href="{{ route('gallery') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-md bg-white text-[#1e3a5f] font-extrabold shadow hover:bg-gray-100 no-underline hover:no-underline">
                            View Gallery
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-3">
                    @foreach ($galleryPreview as $img)
                        <a href="{{ route('gallery') }}" class="aspect-square rounded-xl overflow-hidden bg-white/10 border border-white/10 block">
                            <img src="{{ asset($img) }}" alt="Gallery" class="w-full h-full object-cover hover:scale-[1.02] transition">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <div>
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Contact</div>
                    <h2 class="mt-2 text-3xl font-extrabold tracking-tight">Talk to us</h2>
                    <p class="mt-3 text-gray-600">Need support or partnership? Send a message and we’ll respond.</p>

                    <div class="mt-6 space-y-2 text-sm text-gray-700">
                        <div><span class="font-bold">Location:</span> Mwanza, Tanzania</div>
                        <div><span class="font-bold">Email:</span> info@crosstzcycling.co.tz</div>
                        <div><span class="font-bold">Phone:</span> +255 744 428 449</div>
                    </div>
                </div>

                <div class="rounded-3xl border border-gray-200 p-6 sm:p-8 shadow-sm bg-gradient-to-br from-white via-white to-gray-50">
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Newsletter</div>
                    <div class="mt-2 text-2xl font-extrabold text-gray-900">Stay updated</div>
                    <p class="text-sm text-gray-600 mt-2">Pata taarifa za events mpya, community rides, na updates za CTCMS.</p>
                    <form class="mt-5 flex flex-col sm:flex-row gap-3">
                        <input type="email" placeholder="Your email" class="flex-1 px-4 py-3 rounded-md border border-gray-300 bg-white focus:ring-2 focus:ring-[#2a527d] focus:border-[#2a527d] outline-none">
                        <button type="button" class="px-6 py-3 rounded-md bg-[#c53030] hover:bg-[#a22828] text-white font-extrabold shadow whitespace-nowrap">Subscribe</button>
                    </form>
                    <p class="mt-3 text-xs text-gray-500">No spam. Unsubscribe anytime.</p>
                </div>
            </div>
        </div>
    </section>
</main>

@include('landing.partials.footer')
@endsection
