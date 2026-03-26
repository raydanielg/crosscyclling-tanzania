@extends('landing.layout')

@section('body')
@include('landing.partials.header')

<main class="bg-gray-50">
    <section class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                <div>
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">About Cross Tanzania Cycling</div>
                    <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">Cross Tanzania Cycling Management System</h1>
                    <p class="mt-3 text-gray-600">Cross Tanzania Cycling Management System (CTCMS) ni mfumo wa kisasa unaounganisha jamii ya baiskeli Tanzania—matukio, wanachama, wadau, na taarifa zote sehemu moja.</p>
                </div>

                <nav class="text-sm text-gray-600">
                    <a href="{{ url('/') }}" class="font-bold text-gray-700 hover:text-[#2a527d] no-underline hover:no-underline">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-500">About</span>
                </nav>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div class="bg-white rounded-3xl border border-gray-200 p-6 sm:p-8 shadow-sm">
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Mission</div>
                    <h2 class="mt-2 text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">Cross Tanzania. One Cycling Community.</h2>
                    <p class="mt-4 text-gray-700 leading-relaxed">
                        Cross Tanzania ni dhamira ya kuunganisha nchi nzima kupitia baiskeli—kukutanisha mikoa, tamaduni, na jamii.
                        CTCMS inarahisisha usimamizi wa matukio, usajili, mawasiliano, na taarifa za wadau kwa njia ya kisasa na salama.
                    </p>

                    <div class="mt-6 grid gap-3">
                        <div class="flex items-start gap-3">
                            <div class="mt-1 h-2.5 w-2.5 rounded-full bg-[#2a527d]"></div>
                            <div class="text-gray-700"><span class="font-extrabold">Events</span> zenye ratiba, usajili, status na nafasi.</div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="mt-1 h-2.5 w-2.5 rounded-full bg-[#2a527d]"></div>
                            <div class="text-gray-700"><span class="font-extrabold">Community</span> updates, blog posts, na taarifa za rides.</div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="mt-1 h-2.5 w-2.5 rounded-full bg-[#2a527d]"></div>
                            <div class="text-gray-700"><span class="font-extrabold">Partners</span> na sponsors kuonekana kwa uwazi na ushirikiano.</div>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('events') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-md bg-[#2a527d] text-white font-extrabold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">View Events</a>
                        <a href="{{ route('blog.index') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-md border border-gray-300 text-gray-900 font-extrabold hover:bg-white no-underline hover:no-underline">Read Blog</a>
                    </div>
                </div>

                <div class="rounded-3xl overflow-hidden border border-gray-200 bg-white shadow-sm">
                    <div class="relative h-80">
                        <img src="{{ asset('images/Highlights/DEE_1095.jpg') }}" alt="Cycling" class="w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-black/10 to-transparent"></div>
                        <div class="absolute left-6 bottom-6 text-white">
                            <div class="text-xs font-extrabold uppercase tracking-widest text-white/80">CTCMS</div>
                            <div class="mt-1 text-2xl font-extrabold">Build. Ride. Grow.</div>
                            <div class="mt-2 text-sm text-white/85 max-w-md">Usimamizi wa matukio na mawasiliano—kwa waendesha baiskeli, organizers, na sponsors.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('landing.partials.footer')
@endsection
