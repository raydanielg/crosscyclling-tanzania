@extends('rider.layout')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
        <div>
            <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Dashboard</div>
            <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900">Welcome back, {{ auth()->user()->name }}</h1>
            <p class="mt-2 text-gray-600">Hapa ndio kituo chako cha taarifa—events, updates, na profile yako.</p>
        </div>

        <a href="{{ route('events') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-md bg-[#2a527d] text-white font-extrabold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">Browse Events</a>
    </div>

    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6">
            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">My Applications</div>
            <div class="mt-2 text-3xl font-extrabold text-gray-900">{{ auth()->user()->eventApplications()->count() }}</div>
            <div class="mt-2 text-sm text-gray-600">Events you applied for</div>
            <a href="{{ route('rider.my-events') }}" class="mt-4 inline-block text-xs font-extrabold text-[#2a527d] uppercase tracking-wider no-underline hover:no-underline">View all</a>
        </div>

        <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6">
            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">My Awards</div>
            <div class="mt-2 text-3xl font-extrabold text-gray-900">{{ auth()->user()->awards()->count() }}</div>
            <div class="mt-2 text-sm text-gray-600">Awards & achievements</div>
            <a href="{{ route('rider.profile') }}" class="mt-4 inline-block text-xs font-extrabold text-[#2a527d] uppercase tracking-wider no-underline hover:no-underline">View profile</a>
        </div>

        <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6">
            <div class="text-xs font-extrabold uppercase tracking-widest text-gray-500">Profile Status</div>
            <div class="mt-2 text-sm font-semibold text-gray-900">
                @php
                    $fields = ['phone', 'gender', 'date_of_birth', 'region', 'city', 'club', 'bio', 'avatar_path'];
                    $completed = 0;
                    foreach($fields as $f) {
                        if(auth()->user()->$f) $completed++;
                    }
                    $percent = round(($completed / count($fields)) * 100);
                @endphp
                <div class="flex items-center justify-between mb-1">
                    <span>{{ $percent }}% Complete</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-2">
                    <div class="bg-[#2a527d] h-2 rounded-full" style="width: {{ $percent }}%"></div>
                </div>
            </div>
            <div class="mt-4 text-xs text-gray-500 font-semibold">Keep your profile updated!</div>
            <a href="{{ route('rider.profile') }}" class="mt-2 inline-block text-xs font-extrabold text-[#2a527d] uppercase tracking-wider no-underline hover:no-underline">Edit profile</a>
        </div>
    </div>
@endsection
