@extends('rider.layout')

@section('content')
    <div>
        <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Apply</div>
        <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900">Step 2: Payment</h1>
        <p class="mt-2 text-gray-600">Chagua njia ya malipo: Snniper au Lipa Namba.</p>
    </div>

    <div class="mt-6 grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <div class="lg:col-span-7">
            <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6 sm:p-8">
                <div class="text-sm font-extrabold text-gray-900">Event</div>
                <div class="mt-1 text-gray-700 font-semibold">{{ $event->name }} • {{ $event->location }}</div>

                <form class="mt-6 space-y-5" method="POST" action="{{ route('rider.apply.step2.store', [$event, $application]) }}" x-data="{ method: '{{ old('payment_method', $application->payment_method ?: 'snniper') }}' }">
                    @csrf

                    <div class="grid gap-3">
                        <label class="flex items-start gap-3 p-4 rounded-2xl border border-gray-200 cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="payment_method" value="snniper" class="mt-1" x-model="method" />
                            <span>
                                <span class="block font-extrabold text-gray-900">Snniper</span>
                                <span class="block text-sm text-gray-600">Utapelekwa kwenye malipo ya Snniper (tutaiunganisha API baadaye)</span>
                            </span>
                        </label>

                        <label class="flex items-start gap-3 p-4 rounded-2xl border border-gray-200 cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="payment_method" value="lipa_namba" class="mt-1" x-model="method" />
                            <span>
                                <span class="block font-extrabold text-gray-900">Lipa Namba</span>
                                <span class="block text-sm text-gray-600">Lipa kwa namba kisha endelea</span>
                            </span>
                        </label>
                        @error('payment_method')
                            <div class="text-xs font-semibold text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="rounded-2xl border border-gray-200 p-4" x-show="method === 'lipa_namba'" x-cloak>
                        <div class="text-sm font-extrabold text-gray-900">Lipa Namba instructions</div>
                        <div class="mt-2 text-sm text-gray-600">
                            Lipa kwenye namba: <span class="font-extrabold text-gray-900">{{ \Illuminate\Support\Facades\DB::table('payment_settings')->where('key', 'lipa_namba')->value('value') ?? '253627' }}</span>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-gray-200 p-4" x-show="method === 'snniper'" x-cloak>
                        <div class="text-sm font-extrabold text-gray-900">Snniper</div>
                        <div class="mt-2 text-sm text-gray-600">
                            Kwa sasa tuta-mark payment status kama <span class="font-extrabold">pending</span>. Tukiunganisha Snniper, itaku-complete automatically.
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-2">
                        <a href="{{ route('rider.apply.step1', $event) }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md border border-gray-300 text-gray-900 font-extrabold hover:bg-white no-underline hover:no-underline">Back</a>
                        <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md bg-[#2a527d] text-white font-extrabold shadow hover:bg-[#1e3a5f]">Continue</button>
                    </div>
                </form>
            </div>
        </div>

        <aside class="lg:col-span-5">
            <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6 sm:p-8">
                <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Applicant</div>
                <div class="mt-2 font-extrabold text-gray-900">{{ $application->applicant_name }}</div>
                <div class="mt-1 text-sm text-gray-600">{{ $application->applicant_phone }}</div>

                <div class="mt-5 text-xs font-extrabold uppercase tracking-widest text-gray-500">Current</div>
                <div class="mt-2 text-sm text-gray-700 font-semibold">Payment: {{ strtoupper($application->payment_status) }}</div>
                <div class="mt-1 text-sm text-gray-700 font-semibold">Application: {{ strtoupper($application->status) }}</div>
            </div>
        </aside>
    </div>
@endsection
