@extends('rider.layout')

@section('content')
    <div class="flex items-center justify-between gap-4">
        <div>
            <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Participants</div>
            <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900">{{ $event->name }}</h1>
            <p class="mt-2 text-gray-600">Orodha ya washiriki waliokubaliwa kwenye event hii. {{ $participants->count() }} participants.</p>
        </div>

        <a href="{{ route('rider.events') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md border border-gray-300 text-gray-900 font-extrabold hover:bg-white no-underline hover:no-underline">Back to events</a>
    </div>

    @if($participants->isEmpty())
        <div class="mt-6 rounded-3xl border border-gray-200 bg-white shadow-sm p-12 text-center">
            <div class="text-gray-400 text-6xl mb-4">🏃‍♂️</div>
            <div class="text-xl font-extrabold text-gray-900">Hakuna washiriki bado</div>
            <div class="mt-2 text-gray-600">Washiriki wataonekana hapa baada ya admin ku-approve applications.</div>
        </div>
    @else
        <div class="mt-6 rounded-3xl border border-gray-200 bg-white shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="text-left px-5 py-3 font-extrabold">Rider Number</th>
                            <th class="text-left px-5 py-3 font-extrabold">Name</th>
                            <th class="text-left px-5 py-3 font-extrabold">Phone</th>
                            <th class="text-left px-5 py-3 font-extrabold">Type</th>
                            <th class="text-left px-5 py-3 font-extrabold">Payment</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($participants as $participant)
                            <tr class="hover:bg-gray-50">
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-[#2a527d] text-white">{{ $participant->rider_number }}</span>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="font-extrabold text-gray-900">{{ $participant->applicant_name }}</div>
                                    @if($participant->applicant_type === 'other')
                                        <div class="text-xs text-gray-500">Applied by: {{ $participant->user->name }}</div>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-gray-700 font-semibold">
                                    {{ $participant->applicant_phone }}
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold {{ $participant->applicant_type === 'self' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ strtoupper($participant->applicant_type) }}
                                    </span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold {{ $participant->payment_method === 'snniper' ? 'bg-purple-100 text-purple-800' : 'bg-orange-100 text-orange-800' }}">
                                        {{ strtoupper($participant->payment_method ?: '—') }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6 text-center">
                <div class="text-3xl font-extrabold text-[#2a527d]">{{ $participants->count() }}</div>
                <div class="mt-2 text-sm font-semibold text-gray-600">Total Participants</div>
            </div>
            <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6 text-center">
                <div class="text-3xl font-extrabold text-green-600">{{ $participants->where('applicant_type', 'self')->count() }}</div>
                <div class="mt-2 text-sm font-semibold text-gray-600">Self Applications</div>
            </div>
            <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6 text-center">
                <div class="text-3xl font-extrabold text-blue-600">{{ $participants->where('applicant_type', 'other')->count() }}</div>
                <div class="mt-2 text-sm font-semibold text-gray-600">Proxy Applications</div>
            </div>
        </div>
    @endif
@endsection