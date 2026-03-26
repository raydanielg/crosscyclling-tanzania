@extends('landing.layout')

@section('body')
@include('landing.partials.header')

<main class="bg-gray-50">
    <section class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                <div>
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Events</div>
                    <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">Upcoming rides & competitions</h1>
                    <p class="mt-2 text-gray-600">Matukio yote yapo hapa—status, slots, location, na taarifa muhimu.</p>
                </div>

                <nav class="text-sm text-gray-600">
                    <a href="{{ url('/') }}" class="font-bold text-gray-700 hover:text-[#2a527d] no-underline hover:no-underline">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-500">Events</span>
                </nav>
            </div>
        </div>
    </section>

    <section class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <div class="lg:col-span-8">
                    <div class="flex items-center justify-between gap-4">
                        <div class="text-sm text-gray-600">
                            Showing: <span class="font-extrabold text-gray-900">{{ strtoupper($status ?? 'all') }}</span>
                        </div>
                        @guest
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md bg-[#2a527d] text-white font-extrabold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">Register to Join</a>
                        @else
                            <a href="{{ route('rider.dashboard') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md bg-[#2a527d] text-white font-extrabold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">My Dashboard</a>
                        @endguest
                    </div>

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($events as $event)
                            @php
                                $st = strtolower((string) $event->status);
                                $appStatus = strtolower((string) $event->application_status);

                                $statusLabel = strtoupper($st ?: 'PLANNED');
                                $statusColor = match ($st) {
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
                                <div class="relative h-52">
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
                                        <div class="text-xs text-gray-500 font-bold">Start: <span class="text-gray-800">{{ $event->starts_at ? $event->starts_at->format('M d, Y \a\t H:i') : 'TBA' }}</span></div>

                                        @if (Auth::check() && in_array($event->id, $appliedEventIds))
                                            <span class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-blue-100 text-blue-700 text-xs font-extrabold shadow-sm">Applied</span>
                                        @elseif ($st === 'open' && $appStatus === 'open')
                                            <a href="{{ route('rider.apply.step1', $event) }}" class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-[#2a527d] text-white text-xs font-extrabold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">Apply</a>
                                        @elseif ($st === 'closed')
                                            <span class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-gray-100 text-gray-500 text-xs font-extrabold">Closed</span>
                                        @else
                                            <span class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-gray-100 text-gray-500 text-xs font-extrabold">Coming Soon</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-10">
                        {{ $events->links() }}
                    </div>

                    @if ($events->count() === 0)
                        <div class="mt-10 text-center text-gray-600">No events found.</div>
                    @endif
                </div>

                <aside class="lg:col-span-4">
                    <div class="bg-white rounded-3xl border border-gray-200 p-5 shadow-sm">
                        <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Filter</div>
                        <div class="mt-2 text-xl font-extrabold text-gray-900">Status</div>

                        @php
                            $items = [
                                ['key' => 'all', 'label' => 'All'],
                                ['key' => 'open', 'label' => 'Open'],
                                ['key' => 'planned', 'label' => 'Planned'],
                                ['key' => 'closed', 'label' => 'Closed'],
                            ];
                        @endphp

                        <div class="mt-5 grid gap-2">
                            @foreach ($items as $it)
                                @php
                                    $active = ($status ?? 'all') === $it['key'];
                                @endphp
                                <a
                                    href="{{ route('events', ['status' => $it['key']]) }}"
                                    class="flex items-center justify-between rounded-2xl border px-4 py-3 transition no-underline hover:no-underline {{ $active ? 'border-[#2a527d] bg-[#2a527d]/5' : 'border-gray-200 hover:bg-gray-50' }}"
                                >
                                    <span class="font-extrabold {{ $active ? 'text-[#2a527d]' : 'text-gray-900' }}">{{ $it['label'] }}</span>
                                    <span class="text-sm font-extrabold text-gray-600">{{ $counts[$it['key']] ?? 0 }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        
        </div>
    </section>
</main>

@include('landing.partials.footer')
@endsection
