@extends('rider.layout')

@section('content')
    @php
        $event = $application->event;
        $st = strtolower((string) $application->status);
        $pay = strtolower((string) $application->payment_status);

        $stClass = match ($st) {
            'approved' => 'bg-green-100 text-green-800',
            'rejected' => 'bg-red-100 text-red-800',
            default => 'bg-amber-100 text-amber-800',
        };

        $payClass = match ($pay) {
            'paid' => 'bg-green-100 text-green-800',
            'failed' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-700',
        };
    @endphp

    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
        <div>
            <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">My Event</div>
            <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900">{{ $event?->name ?? 'Event' }}</h1>
            <p class="mt-2 text-gray-600">Maelezo ya application yako, malipo, na status.</p>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('rider.my-events') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md border border-gray-300 text-gray-900 font-extrabold hover:bg-white no-underline hover:no-underline">Back</a>
            @if ($st === 'draft')
                <a href="{{ $event ? route('rider.apply.step2', [$event, $application]) : route('rider.my-events') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md bg-gray-900 text-white font-extrabold shadow hover:bg-black no-underline hover:no-underline">Continue</a>
            @endif
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <div class="lg:col-span-7">
            <div class="rounded-3xl overflow-hidden border border-gray-200 bg-white shadow-sm">
                <div class="relative h-56 bg-gray-100">
                    @if($event && $event->image_path)
                        <img src="{{ asset($event->image_path) }}" alt="{{ $event->name }}" class="w-full h-full object-cover" />
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f2d4d]/85 via-[#1e3a5f]/35 to-transparent"></div>

                    <div class="absolute left-5 right-5 top-5 flex items-center justify-between gap-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-white/20 text-white border border-white/25">Application</span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-white/20 text-white border border-white/25">#{{ $application->id }}</span>
                    </div>

                    <div class="absolute left-5 right-5 bottom-5">
                        <div class="text-white font-extrabold text-xl">{{ $event?->location }}</div>
                        <div class="mt-2 flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-white/20 text-white border border-white/25">Status: {{ strtoupper($st) }}</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-white/20 text-white border border-white/25">Pay: {{ strtoupper($pay) }}</span>
                            @if($application->payment_method)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-white/20 text-white border border-white/25">{{ strtoupper($application->payment_method) }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Start</div>
                            <div class="mt-2 font-extrabold text-gray-900">{{ $event?->starts_at ? $event->starts_at->format('M d, Y H:i') : 'TBA' }}</div>
                        </div>
                        <div>
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Distance</div>
                            <div class="mt-2 font-extrabold text-gray-900">{{ $event?->distance_km ? $event->distance_km . ' KM' : '—' }}</div>
                        </div>
                        <div>
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Route</div>
                            <div class="mt-2 font-extrabold text-gray-900">{{ $event?->route ?: '—' }}</div>
                        </div>
                        <div>
                            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Slots</div>
                            <div class="mt-2 font-extrabold text-gray-900">{{ $event?->slots_remaining ?? '—' }} / {{ $event?->slots_total ?? '—' }}</div>
                        </div>
                    </div>

                    @if($event?->description)
                        <div class="mt-6 text-sm text-gray-600 leading-relaxed">{{ $event->description }}</div>
                    @endif
                </div>
            </div>
        </div>

        <aside class="lg:col-span-5">
            <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6 sm:p-8">
                <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Application status</div>
                <div class="mt-3 flex flex-wrap gap-2">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold {{ $stClass }}">{{ strtoupper($st) }}</span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold {{ $payClass }}">PAY: {{ strtoupper($pay) }}</span>
                </div>

                <div class="mt-6 grid gap-4">
                    <div class="rounded-2xl border border-gray-200 p-4">
                        <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Applicant</div>
                        <div class="mt-2 font-extrabold text-gray-900">{{ $application->applicant_name }}</div>
                        <div class="mt-1 text-sm text-gray-600">{{ $application->applicant_phone }}</div>
                        <div class="mt-2 text-xs text-gray-500 font-semibold">Type: {{ strtoupper($application->applicant_type) }}</div>
                    </div>

                    @if ($application->rider_number)
                        <div class="rounded-2xl border border-blue-200 bg-blue-50 p-4 animate__animated animate__pulse">
                            <div class="text-xs font-extrabold uppercase tracking-widest text-blue-600">Rider Number (Verified)</div>
                            <div class="mt-2 text-3xl font-extrabold text-blue-900 tracking-widest">{{ $application->rider_number }}</div>
                            <div class="mt-2 text-[10px] text-blue-700 font-semibold uppercase">Hii ndio namba yako rasmi ya ushiriki</div>
                        </div>
                    @endif

                    <div class="rounded-2xl border border-gray-200 p-4">
                        <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Payment</div>
                        <div class="mt-2 text-sm text-gray-700 font-semibold">Method: {{ $application->payment_method ? strtoupper($application->payment_method) : '—' }}</div>
                        <div class="mt-1 text-sm text-gray-700 font-semibold">Status: {{ strtoupper($pay) }}</div>

                        @if ($application->payment_method === 'lipa_namba')
                            <div class="mt-3 text-sm text-gray-600">Lipa Namba: <span class="font-extrabold text-gray-900">{{ \Illuminate\Support\Facades\DB::table('payment_settings')->where('key', 'lipa_namba')->value('value') ?? '253627' }}</span></div>
                        @endif
                    </div>

                    <div class="rounded-2xl border border-gray-200 p-4">
                        <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Timeline</div>
                        <div class="mt-2 text-sm text-gray-700 font-semibold">Created: {{ $application->created_at?->format('M d, Y H:i') }}</div>
                        <div class="mt-1 text-sm text-gray-700 font-semibold">Submitted: {{ $application->submitted_at?->format('M d, Y H:i') ?? '—' }}</div>
                    </div>
                </div>

                <div class="mt-6 border-t border-gray-100 pt-5">
                    <div class="text-sm font-extrabold text-gray-900">Next step</div>
                    @if ($st === 'pending')
                        <div class="mt-2 text-sm text-gray-600">Admin atapitia na ku-approve. Endelea kufuatilia hapa.</div>
                    @elseif ($st === 'approved')
                        <div class="mt-2 text-sm text-gray-600">Ume-approve. Karibu kwenye event.</div>
                    @elseif ($st === 'rejected')
                        <div class="mt-2 text-sm text-gray-600">Application imekataliwa. Wasiliana nasi kwa msaada.</div>
                    @else
                        <div class="mt-2 text-sm text-gray-600">Bado hujakamilisha. Bonyeza Continue.</div>
                    @endif
                </div>
            </div>
        </aside>
    </div>
@endsection
