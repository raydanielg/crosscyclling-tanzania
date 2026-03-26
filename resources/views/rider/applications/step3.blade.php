@extends('rider.layout')

@section('content')
    <div>
        <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Apply</div>
        <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900">Step 3: Confirm & Finish</h1>
        <p class="mt-2 text-gray-600">Hakiki taarifa zako kisha malizia application.</p>
    </div>

    <div class="mt-6 grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <div class="lg:col-span-7">
            <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6 sm:p-8">
                <div class="text-sm font-extrabold text-gray-900">Summary</div>

                <div class="mt-4 grid gap-3">
                    <div class="rounded-2xl border border-gray-200 p-4">
                        <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Event</div>
                        <div class="mt-2 font-extrabold text-gray-900">{{ $event->name }}</div>
                        <div class="mt-1 text-sm text-gray-600">{{ $event->location }}</div>
                    </div>

                    <div class="rounded-2xl border border-gray-200 p-4">
                        <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Applicant</div>
                        <div class="mt-2 font-extrabold text-gray-900">{{ $application->applicant_name }}</div>
                        <div class="mt-1 text-sm text-gray-600">{{ $application->applicant_phone }}</div>
                        <div class="mt-2 text-xs text-gray-500 font-semibold">Type: {{ strtoupper($application->applicant_type) }}</div>
                    </div>

                    <div class="rounded-2xl border border-gray-200 p-4">
                        <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Payment</div>
                        <div class="mt-2 font-extrabold text-gray-900">{{ strtoupper((string) $application->payment_method) }}</div>
                        <div class="mt-1 text-sm text-gray-600">Status: {{ strtoupper($application->payment_status) }}</div>
                        @if($application->payment_reference)
                            <div class="mt-2 text-sm text-gray-600">Reference: <span class="font-extrabold text-gray-900">{{ $application->payment_reference }}</span></div>
                        @endif
                    </div>
                </div>

                <form class="mt-6 flex items-center justify-end gap-3" method="POST" action="{{ route('rider.apply.finish', [$event, $application]) }}">
                    @csrf
                    <a href="{{ route('rider.apply.step2', [$event, $application]) }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md border border-gray-300 text-gray-900 font-extrabold hover:bg-white no-underline hover:no-underline">Back</a>
                    <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md bg-gray-900 text-white font-extrabold shadow hover:bg-black">Finish</button>
                </form>
            </div>
        </div>

        <aside class="lg:col-span-5">
            <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6 sm:p-8">
                <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">What happens next?</div>
                <div class="mt-2 text-sm text-gray-700 font-semibold">
                    Ukimaliza, application itaingia kwenye <span class="font-extrabold">My Events</span> ikiwa <span class="font-extrabold">Pending</span> mpaka admin a-approve.
                </div>
            </div>
        </aside>
    </div>
@endsection
