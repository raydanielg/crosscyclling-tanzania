@extends('rider.layout')

@section('content')
    <div class="flex items-center justify-between gap-4">
        <div>
            <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Events</div>
            <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900">All events</h1>
            <p class="mt-2 text-gray-600">Orodha ya events zote. Bonyeza Apply kwenye zile zilizo open.</p>
        </div>

        <a href="{{ route('events') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md border border-gray-300 text-gray-900 font-extrabold hover:bg-white no-underline hover:no-underline">Public Events Page</a>
    </div>

    <div class="mt-6 rounded-3xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="text-left px-5 py-3 font-extrabold">Event</th>
                        <th class="text-left px-5 py-3 font-extrabold">Status</th>
                        <th class="text-left px-5 py-3 font-extrabold">Start</th>
                        <th class="text-left px-5 py-3 font-extrabold">Slots</th>
                        <th class="text-right px-5 py-3 font-extrabold">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($events as $event)
                        @php
                            $st = strtolower((string) $event->status);
                            $appStatus = strtolower((string) $event->application_status);
                        @endphp
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-4">
                                <div class="font-extrabold text-gray-900">{{ $event->name }}</div>
                                <div class="text-xs text-gray-500">{{ $event->location }}@if($event->route) ({{ $event->route }}) @endif</div>
                            </td>
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold {{ $st === 'open' ? 'bg-green-100 text-green-800' : ($st === 'closed' ? 'bg-red-100 text-red-800' : 'bg-amber-100 text-amber-800') }}">
                                    {{ strtoupper($st ?: 'planned') }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-gray-700 font-semibold">
                                {{ $event->starts_at ? $event->starts_at->format('M d, Y H:i') : 'TBA' }}
                            </td>
                            <td class="px-5 py-4 text-gray-700 font-semibold">
                                {{ $event->slots_remaining ?? '—' }} / {{ $event->slots_total ?? '—' }}
                            </td>
                            <td class="px-5 py-4 text-right">
                                @if (in_array($event->id, $appliedEventIds))
                                    <span class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-blue-100 text-blue-700 text-xs font-extrabold shadow-sm">Applied</span>
                                @elseif ($st === 'open' && $appStatus === 'open')
                                    <a href="{{ route('rider.apply.step1', $event) }}" class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-[#2a527d] text-white text-xs font-extrabold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">Apply</a>
                                @else
                                    <span class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-gray-100 text-gray-500 text-xs font-extrabold">N/A</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $events->links() }}
    </div>
@endsection
