@extends('landing.layout')

@section('title', 'Events - Cross Tanzania Cycling')

@section('body')
@include('landing.partials.header')

<main class="bg-[#f8fafc]">
    {{-- Page Header --}}
    <section class="relative py-20 bg-[#0f2d4d] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/Highlights/DEE_1208.jpg') }}" alt="Events Header" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-b from-[#0f2d4d]/80 to-[#0f2d4d]"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-8">
                <div data-aos="fade-right">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/20 text-xs font-black text-blue-400 uppercase tracking-widest mb-4">
                        Events Calendar
                    </div>
                    <h1 class="text-4xl sm:text-5xl font-poppins font-black text-white leading-tight">
                        Upcoming Rides & <br/>
                        <span class="text-blue-400">Competitions</span>
                    </h1>
                    <p class="mt-4 text-white/60 text-lg max-w-xl">
                        Matukio yote ya baiskeli Tanzania yapo hapa—status, slots, location, na kila kitu unachohitaji kujua.
                    </p>
                </div>

                <nav class="flex items-center gap-2 text-sm font-bold" data-aos="fade-left">
                    <a href="{{ url('/') }}" class="text-white/40 hover:text-white transition-colors no-underline">Home</a>
                    <svg class="w-4 h-4 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    <span class="text-blue-400">Events</span>
                </nav>
            </div>
        </div>
    </section>

    {{-- Events List & Filters --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                {{-- Left Side: Filters (Mobile) / Sticky Sidebar (Desktop) --}}
                <aside class="lg:col-span-3 lg:sticky lg:top-24 space-y-8" data-aos="fade-right">
                    <div class="bg-white rounded-[2rem] border border-gray-100 p-8 shadow-sm">
                        <h3 class="font-poppins font-black text-gray-900 text-lg mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#2a527d]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" /></svg>
                            Filter by Status
                        </h3>

                        @php
                            $items = [
                                ['key' => 'all', 'label' => 'All Events', 'icon' => 'M4 6h16M4 10h16M4 14h16M4 18h16'],
                                ['key' => 'open', 'label' => 'Open Now', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                                ['key' => 'planned', 'label' => 'Planned', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                                ['key' => 'closed', 'label' => 'Completed', 'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'],
                            ];
                        @endphp

                        <div class="space-y-2">
                            @foreach ($items as $it)
                                @php
                                    $active = ($status ?? 'all') === $it['key'];
                                @endphp
                                <a
                                    href="{{ route('events', ['status' => $it['key']]) }}"
                                    class="group flex items-center justify-between px-5 py-4 rounded-2xl transition-all duration-300 no-underline hover:no-underline {{ $active ? 'bg-[#2a527d] text-white shadow-lg shadow-blue-900/20' : 'bg-gray-50 text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}"
                                >
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $it['icon'] }}" /></svg>
                                        <span class="font-bold text-sm">{{ $it['label'] }}</span>
                                    </div>
                                    <span class="px-2 py-0.5 rounded-md text-[10px] font-black {{ $active ? 'bg-white/20' : 'bg-gray-200 text-gray-500' }}">
                                        {{ $counts[$it['key']] ?? 0 }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Community Card --}}
                    <div class="bg-gradient-to-br from-[#2a527d] to-[#0f2d4d] rounded-[2.5rem] p-8 text-white shadow-xl shadow-blue-900/20 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-white/20 transition-colors"></div>
                        <div class="relative z-10">
                            <h4 class="font-poppins font-black text-xl mb-4 leading-tight">Want to join <br/> the community?</h4>
                            <p class="text-white/70 text-sm mb-6 leading-relaxed">Sajili akaunti yako upate updates zote na uweze kujiandikisha kwenye mashindano.</p>
                            <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#c53030] text-white text-xs font-black shadow-lg shadow-red-900/40 hover:bg-[#a22828] hover:-translate-y-0.5 transition-all no-underline">
                                Register Now
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg>
                            </a>
                        </div>
                    </div>
                </aside>

                {{-- Right Side: Events Grid --}}
                <div class="lg:col-span-9">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8" data-aos="fade-down">
                        <div class="text-sm text-gray-500 font-bold uppercase tracking-widest flex items-center gap-2">
                            <span class="w-8 h-px bg-[#2a527d]"></span>
                            Showing: <span class="text-gray-900 font-black">{{ strtoupper($status ?? 'all') }}</span>
                        </div>
                        
                        <div class="flex items-center gap-2 text-xs text-gray-400 font-bold">
                            Total: <span class="text-gray-900 font-black">{{ $events->total() }} Events found</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @forelse ($events as $idx => $event)
                            @php
                                $st = strtolower((string) $event->status);
                                $appStatus = strtolower((string) $event->application_status);

                                $statusLabel = strtoupper($st ?: 'PLANNED');
                                $statusColor = match ($st) {
                                    'open' => 'bg-green-500 text-white',
                                    'closed' => 'bg-red-500 text-white',
                                    default => 'bg-amber-500 text-white',
                                };
                            @endphp

                            <div class="group flex flex-col h-full rounded-[2.5rem] overflow-hidden bg-white border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-500" data-aos="fade-up" data-aos-delay="{{ ($idx % 2) * 100 }}">
                                <div class="relative h-64 overflow-hidden">
                                    <img src="{{ $event->image_path ? asset($event->image_path) : asset('images/hero-cycling.jpg') }}" alt="{{ $event->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                                    
                                    <div class="absolute top-4 left-4 right-4 flex justify-between">
                                        <span class="px-3 py-1 rounded-lg text-[10px] font-black tracking-widest {{ $statusColor }} shadow-lg shadow-black/20">
                                            {{ $statusLabel }}
                                        </span>
                                        @if($appStatus === 'open')
                                        <span class="px-3 py-1 rounded-lg bg-white/20 backdrop-blur-md text-white text-[10px] font-black tracking-widest border border-white/30">
                                            REGISTRATION OPEN
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
                                        <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100 group-hover:bg-blue-50 transition-colors">
                                            <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Distance</div>
                                            <div class="text-sm font-black text-gray-900">{{ $event->distance_km ?: 'TBA' }} KM</div>
                                        </div>
                                        <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100 group-hover:bg-blue-50 transition-colors">
                                            <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Slots Left</div>
                                            <div class="text-sm font-black text-gray-900">{{ $event->slots_remaining ?: $event->slots_total ?: 'TBA' }}</div>
                                        </div>
                                    </div>

                                    <div class="mt-auto pt-6 border-t border-gray-50 flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <div class="w-10 h-10 rounded-xl bg-[#2a527d]/5 border border-[#2a527d]/10 flex items-center justify-center text-[#2a527d]">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                            </div>
                                            <div>
                                                <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Start Date</div>
                                                <div class="text-xs font-black text-gray-900">{{ $event->starts_at ? $event->starts_at->format('M d, Y') : 'TBA' }}</div>
                                            </div>
                                        </div>
                                        
                                        @if (Auth::check() && in_array($event->id, $appliedEventIds))
                                            <span class="inline-flex items-center gap-1.5 px-6 py-2.5 rounded-xl bg-blue-50 text-[#2a527d] text-xs font-black">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                                                Applied
                                            </span>
                                        @elseif ($st === 'open' && $appStatus === 'open')
                                            <a href="{{ route('rider.apply.step1', $event) }}" class="px-6 py-2.5 rounded-xl bg-[#2a527d] text-white text-xs font-black shadow-lg shadow-blue-900/10 hover:bg-[#1e3a5f] hover:-translate-y-0.5 transition-all no-underline hover:no-underline">Apply Now</a>
                                        @elseif ($st === 'closed')
                                            <span class="px-6 py-2.5 rounded-xl bg-gray-100 text-gray-400 text-xs font-black">Closed</span>
                                        @else
                                            <span class="px-6 py-2.5 rounded-xl bg-gray-100 text-gray-500 text-xs font-black">Coming Soon</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full py-20 text-center" data-aos="zoom-in">
                                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-300">
                                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                </div>
                                <h3 class="text-xl font-black text-gray-900 mb-2">No events found</h3>
                                <p class="text-gray-500">Hatujapata matukio yoyote kwenye kundi hili kwa sasa.</p>
                                <a href="{{ route('events') }}" class="mt-6 inline-flex text-[#2a527d] font-black hover:underline no-underline">View all events</a>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-16">
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('landing.partials.footer')
@endsection
