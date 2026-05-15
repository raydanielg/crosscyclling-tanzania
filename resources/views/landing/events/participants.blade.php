@extends('landing.layout')

@section('body')
@include('landing.partials.header')

<main class="bg-gray-50 pt-20">
    {{-- Hero Section --}}
    <section class="relative h-[40vh] sm:h-[50vh] overflow-hidden bg-[#0f2d4d]">
        <img src="{{ $event->image_path ? asset($event->image_path) : asset('images/hero-cycling.jpg') }}" alt="{{ $event->name }}" class="absolute inset-0 w-full h-full object-cover opacity-60" />
        <div class="absolute inset-0 bg-gradient-to-t from-[#0f2d4d] via-transparent to-transparent"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-end pb-12">
            <div data-aos="fade-up">
                <div class="text-blue-400 font-black text-xs sm:text-sm uppercase tracking-[0.3em] mb-4">Event Participants</div>
                <h1 class="text-4xl sm:text-6xl font-poppins font-black text-white leading-tight mb-4">
                    {{ $event->name }}
                </h1>
                <div class="flex flex-wrap items-center gap-6 text-white/80 font-bold">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        {{ $event->location }}
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        {{ $event->starts_at ? $event->starts_at->format('M d, Y') : 'TBA' }}
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                        {{ $event->distance_km ?: 'TBA' }} KM
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 -mt-10 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                {{-- Stats Sidebar --}}
                <div class="space-y-6">
                    <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100" data-aos="fade-up">
                        <div class="text-[10px] font-black uppercase text-gray-400 tracking-widest mb-6">Participation Stats</div>
                        <div class="space-y-6">
                            <div>
                                <div class="text-3xl font-black text-[#2a527d]">{{ count($participants) }}</div>
                                <div class="text-xs font-bold text-gray-500 mt-1 uppercase tracking-wider">Confirmed Riders</div>
                            </div>
                            <div class="pt-6 border-t border-gray-50">
                                <div class="text-xl font-black text-gray-900">{{ $event->slots_total ?: 'Unlimited' }}</div>
                                <div class="text-xs font-bold text-gray-500 mt-1 uppercase tracking-wider">Total Slots</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-900 rounded-[2rem] p-8 shadow-xl text-white relative overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                        <div class="absolute -right-4 -top-4 h-24 w-24 bg-blue-500 rounded-full opacity-20 blur-2xl"></div>
                        <h3 class="text-sm font-black uppercase tracking-[0.2em] text-blue-400 mb-4">Want to join?</h3>
                        <p class="text-white/70 text-sm font-medium leading-relaxed mb-6">
                            Jisajili sasa kuwa sehemu ya tukio hili la kihistoria la baiskeli.
                        </p>
                        <a href="{{ route('rider.apply.step1', $event) }}" class="inline-flex items-center justify-center w-full px-6 py-4 rounded-xl bg-blue-600 text-white font-black hover:bg-blue-700 transition-all no-underline hover:no-underline">
                            Apply Now
                        </a>
                    </div>
                </div>

                {{-- Participants Table --}}
                <div class="lg:col-span-3">
                    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                        <div class="px-10 py-8 border-b border-gray-50 flex items-center justify-between">
                            <h2 class="text-xl font-black text-gray-900 tracking-tight">Rider List</h2>
                            <div class="h-10 w-10 rounded-xl bg-gray-50 flex items-center justify-center text-[#2a527d]">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                            </div>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="bg-gray-50/50">
                                        <th class="px-10 py-5 text-left text-[10px] font-black uppercase text-gray-400 tracking-[0.2em]">Rider #</th>
                                        <th class="px-10 py-5 text-left text-[10px] font-black uppercase text-gray-400 tracking-[0.2em]">Full Name</th>
                                        <th class="px-10 py-5 text-left text-[10px] font-black uppercase text-gray-400 tracking-[0.2em]">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @forelse ($participants as $participant)
                                        <tr class="group hover:bg-gray-50/50 transition-all">
                                            <td class="px-10 py-6">
                                                <span class="px-3 py-1 rounded-lg bg-blue-50 text-[#2a527d] text-xs font-black tracking-widest border border-blue-100">
                                                    {{ $participant->rider_number ?: 'TBA' }}
                                                </span>
                                            </td>
                                            <td class="px-10 py-6">
                                                <div class="font-black text-gray-900">{{ $participant->applicant_name }}</div>
                                                <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-0.5">Confirmed Participant</div>
                                            </td>
                                            <td class="px-10 py-6">
                                                <div class="flex items-center gap-2">
                                                    <span class="h-2 w-2 rounded-full bg-green-500 animate-pulse"></span>
                                                    <span class="text-[10px] font-black text-green-600 uppercase tracking-widest">Active Rider</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-10 py-20 text-center">
                                                <div class="flex flex-col items-center">
                                                    <div class="h-16 w-16 bg-gray-50 rounded-full flex items-center justify-center text-gray-300 mb-4">
                                                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                                    </div>
                                                    <div class="text-gray-400 font-bold">Bado hakuna washiriki waliosajiliwa.</div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('landing.partials.footer')
@endsection