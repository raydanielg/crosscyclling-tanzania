@extends('landing.layout')

@section('body')
@include('landing.partials.header')

<main class="bg-gray-50">
    <section class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                <div>
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Partners</div>
                    <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">Sponsors & partners</h1>
                    <p class="mt-2 text-gray-600">Wadau wanaosaidia kukuza michezo ya baiskeli na matukio Tanzania.</p>
                </div>

                <nav class="text-sm text-gray-600">
                    <a href="{{ url('/') }}" class="font-bold text-gray-700 hover:text-[#2a527d] no-underline hover:no-underline">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-500">Partners</span>
                </nav>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @php
                $partners = [
                    ['src' => 'images/partners/BankOfTanzania_logo.svg', 'alt' => 'Bank of Tanzania'],
                    ['src' => 'images/partners/TANESCO LOGO.jpg', 'alt' => 'TANESCO'],
                    ['src' => 'images/partners/TPA Logo_bg_white.png', 'alt' => 'TPA'],
                    ['src' => 'images/partners/airport.png', 'alt' => 'Airport'],
                    ['src' => 'images/partners/contractor registion board CRD.jfif', 'alt' => 'CRB'],
                    ['src' => 'images/partners/jeshi la wnachilogo.png', 'alt' => 'Jeshi la Wananchi'],
                    ['src' => 'images/partners/tamesa.png', 'alt' => 'TAMESA'],
                ];
            @endphp

            <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8">
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-7 gap-4">
                    @foreach ($partners as $p)
                        <div class="h-20 rounded-2xl bg-white border border-gray-200 shadow-sm flex items-center justify-center px-4 transition hover:shadow-md hover:-translate-y-0.5">
                            <img src="{{ asset($p['src']) }}" alt="{{ $p['alt'] }}" class="max-h-12 w-auto object-contain" />
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 rounded-2xl bg-gray-50 border border-gray-200 p-5 flex flex-col sm:flex-row gap-3 items-start sm:items-center justify-between">
                    <div>
                        <div class="font-extrabold text-gray-900">Interested in partnering?</div>
                        <div class="text-sm text-gray-600 mt-1">Tushirikiane kwenye matukio, health campaigns, na community rides.</div>
                    </div>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-md bg-[#2a527d] text-white font-extrabold shadow hover:bg-[#1e3a5f] no-underline hover:no-underline">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
</main>

@include('landing.partials.footer')
@endsection
