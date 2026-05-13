@extends('landing.layout')

@section('body')
@include('landing.partials.header')

<main class="bg-gray-50">
    <section class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                <div>
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Participants</div>
                    <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">{{ $event->name }}</h1>
                    <p class="mt-2 text-gray-600">Participants list for this event. Phone numbers are partially hidden for privacy.</p>
                </div>

                <a href="{{ route('events') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md bg-[#2a527d] text-white font-extrabold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">Back to events</a>
            </div>
        </div>
    </section>

    <section class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-gray-200 bg-white shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50 text-gray-700">
                            <tr>
                                <th class="text-left px-5 py-3 font-extrabold">Rider #</th>
                                <th class="text-left px-5 py-3 font-extrabold">Name</th>
                                <th class="text-left px-5 py-3 font-extrabold">Phone</th>
                                <th class="text-left px-5 py-3 font-extrabold">Type</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($participants as $participant)
                                @php
                                    $phone = $participant->applicant_phone;
                                    $maskedPhone = preg_replace('/(\d{3})$/', '***', $phone);
                                @endphp
                                <tr class="hover:bg-gray-50">
                                    <td class="px-5 py-4 text-gray-900 font-extrabold">{{ $participant->rider_number ?? '—' }}</td>
                                    <td class="px-5 py-4 text-gray-900 font-semibold">{{ $participant->applicant_name }}</td>
                                    <td class="px-5 py-4 text-gray-700">{{ $maskedPhone }}</td>
                                    <td class="px-5 py-4 text-gray-700 uppercase font-semibold">{{ $participant->applicant_type }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-5 py-10 text-center text-gray-500">Hakuna participants waliokubaliwa bado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

@include('landing.partials.footer')
@endsection