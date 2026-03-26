@extends('rider.layout')

@section('content')
    <div class="flex items-center justify-between gap-4">
        <div>
            <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">My Events</div>
            <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900">My applications</h1>
            <p class="mt-2 text-gray-600">Applications zako zitaonekana hapa. Zinaanza <span class="font-extrabold">Pending</span> mpaka admin a-approve.</p>
        </div>

        <a href="{{ route('rider.events') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md bg-[#2a527d] text-white font-extrabold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">Browse Events</a>
    </div>

    @if (session('status'))
        <div class="mt-5 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-800">
            {{ session('status') }}
        </div>
    @endif

    <div class="mt-6 grid gap-4">
        @forelse ($applications as $app)
            @php
                $st = strtolower((string) $app->status);
                $pay = strtolower((string) $app->payment_status);

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

            <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                    <div>
                        <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Event</div>
                        <div class="mt-2 text-xl font-extrabold text-gray-900">{{ $app->event?->name ?? 'Event' }}</div>
                        <div class="mt-1 text-sm text-gray-600">{{ $app->event?->location }}</div>
                        <div class="mt-3 text-sm text-gray-700 font-semibold">Applicant: {{ $app->applicant_name }} • {{ $app->applicant_phone }}</div>
                    </div>

                    <div class="flex flex-wrap gap-2 sm:justify-end">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold {{ $stClass }}">{{ strtoupper($st) }}</span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold {{ $payClass }}">PAY: {{ strtoupper($pay) }}</span>
                        @if ($app->payment_method)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-[#2a527d]/10 text-[#2a527d]">{{ strtoupper($app->payment_method) }}</span>
                        @endif
                    </div>
                </div>

                <div class="mt-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="text-xs text-gray-500 font-semibold">
                        Submitted: {{ $app->submitted_at ? $app->submitted_at->format('M d, Y H:i') : '—' }}
                    </div>

                    <div class="flex items-center gap-2 sm:justify-end">
                        <a href="{{ route('rider.my-events.show', $app) }}" class="inline-flex items-center justify-center px-4 py-2 rounded-md border border-gray-300 text-gray-900 text-xs font-extrabold hover:bg-white no-underline hover:no-underline">View my event</a>

                        @if ($st === 'draft')
                            <a href="{{ route('rider.apply.step2', [$app->event_id, $app->id]) }}" class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-gray-900 text-white text-xs font-extrabold shadow hover:bg-black no-underline hover:no-underline">Continue</a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6 text-gray-700">No applications yet.</div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $applications->links() }}
    </div>
@endsection
