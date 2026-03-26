@extends('rider.layout')

@section('content')
    <div>
        <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Apply</div>
        <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900">Step 1: Applicant details</h1>
        <p class="mt-2 text-gray-600">Chagua kama unatumia details zako au una-apply kwa niaba ya mtu mwingine.</p>
    </div>

    <div class="mt-6 rounded-3xl border border-gray-200 bg-white shadow-sm p-6 sm:p-8">
        <div class="text-sm font-extrabold text-gray-900">Event</div>
        <div class="mt-1 text-gray-700 font-semibold">{{ $event->name }} • {{ $event->location }}</div>

        <form class="mt-6 space-y-5" method="POST" action="{{ route('rider.apply.step1.store', $event) }}" x-data="{ type: '{{ old('applicant_type', 'self') }}' }">
            @csrf

            <div class="grid gap-3">
                <label class="flex items-start gap-3 p-4 rounded-2xl border border-gray-200 cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="applicant_type" value="self" class="mt-1" x-model="type" />
                    <span>
                        <span class="block font-extrabold text-gray-900">Tumia details zangu</span>
                        <span class="block text-sm text-gray-600">{{ auth()->user()->name }} • {{ auth()->user()->phone ?? 'No phone' }}</span>
                    </span>
                </label>

                <label class="flex items-start gap-3 p-4 rounded-2xl border border-gray-200 cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="applicant_type" value="other" class="mt-1" x-model="type" />
                    <span>
                        <span class="block font-extrabold text-gray-900">Niaba ya mtu mwingine</span>
                        <span class="block text-sm text-gray-600">Jaza jina na namba ya simu ya mtu huyo</span>
                    </span>
                </label>
                @error('applicant_type')
                    <div class="text-xs font-semibold text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4" x-show="type === 'other'" x-cloak>
                <div>
                    <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Full name</div>
                    <input name="other_name" value="{{ old('other_name') }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" placeholder="Full name" />
                    @error('other_name')
                        <div class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Phone</div>
                    <input name="other_phone" value="{{ old('other_phone') }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#2a527d] focus:ring-0" placeholder="+255..." />
                    @error('other_phone')
                        <div class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-2">
                <a href="{{ route('rider.events') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md border border-gray-300 text-gray-900 font-extrabold hover:bg-white no-underline hover:no-underline">Cancel</a>
                <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md bg-[#2a527d] text-white font-extrabold shadow hover:bg-[#1e3a5f]">Continue</button>
            </div>
        </form>
    </div>
@endsection
