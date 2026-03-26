@extends('landing.layout')

@section('body')
@include('landing.partials.header')

<main class="bg-gray-50">
    <section class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                <div>
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Contact</div>
                    <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">Get in touch</h1>
                    <p class="mt-2 text-gray-600">Habari fupi, tips, na updates za Cross Tanzania Cycling na matukio ya baiskeli.</p>
                </div>

                <nav class="text-sm text-gray-600">
                    <a href="{{ url('/') }}" class="font-bold text-gray-700 hover:text-[#2a527d] no-underline hover:no-underline">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-500">Contact</span>
                </nav>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
                <div class="bg-white rounded-3xl border border-gray-200 p-6 sm:p-8 shadow-sm">
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Contact details</div>
                    <h2 class="mt-2 text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">Mwanza, Tanzania</h2>

                    <div class="mt-6 grid gap-3 text-sm text-gray-700">
                        <div class="flex items-start gap-3">
                            <div class="mt-1 h-2.5 w-2.5 rounded-full bg-[#2a527d]"></div>
                            <div><span class="font-extrabold">Email:</span> info@crosstzcycling.co.tz</div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="mt-1 h-2.5 w-2.5 rounded-full bg-[#2a527d]"></div>
                            <div><span class="font-extrabold">Phone:</span> +255 744 428 449</div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="mt-1 h-2.5 w-2.5 rounded-full bg-[#2a527d]"></div>
                            <div><span class="font-extrabold">Office:</span> Mwanza, Tanzania</div>
                        </div>
                    </div>

                    <div class="mt-8 rounded-2xl bg-gray-50 border border-gray-200 p-5">
                        <div class="font-extrabold text-gray-900">Newsletter</div>
                        <p class="text-sm text-gray-600 mt-2">Pata taarifa za events mpya, community rides, na updates za CTCMS.</p>
                        <form class="mt-4 flex flex-col sm:flex-row gap-3">
                            <input type="email" placeholder="Your email" class="flex-1 px-4 py-3 rounded-md border border-gray-300 bg-white focus:ring-2 focus:ring-[#2a527d] focus:border-[#2a527d] outline-none">
                            <button type="button" class="px-6 py-3 rounded-md bg-[#c53030] hover:bg-[#a22828] text-white font-extrabold shadow whitespace-nowrap">Subscribe</button>
                        </form>
                        <p class="mt-3 text-xs text-gray-500">No spam. Unsubscribe anytime.</p>
                    </div>
                </div>

                <div class="bg-white rounded-3xl border border-gray-200 p-6 sm:p-8 shadow-sm">
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Send a message</div>
                    <h2 class="mt-2 text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">We will respond</h2>
                    <p class="mt-2 text-gray-600">Hii ni UI ya form (tutaunganisha backend baadaye).</p>

                    <form class="mt-6 grid gap-3">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <input type="text" placeholder="Your name" class="px-4 py-3 rounded-md border border-gray-300 bg-white focus:ring-2 focus:ring-[#2a527d] focus:border-[#2a527d] outline-none" />
                            <input type="email" placeholder="Email" class="px-4 py-3 rounded-md border border-gray-300 bg-white focus:ring-2 focus:ring-[#2a527d] focus:border-[#2a527d] outline-none" />
                        </div>
                        <input type="text" placeholder="Subject" class="px-4 py-3 rounded-md border border-gray-300 bg-white focus:ring-2 focus:ring-[#2a527d] focus:border-[#2a527d] outline-none" />
                        <textarea rows="5" placeholder="Write your message..." class="px-4 py-3 rounded-md border border-gray-300 bg-white focus:ring-2 focus:ring-[#2a527d] focus:border-[#2a527d] outline-none"></textarea>
                        <button type="button" class="justify-self-start px-6 py-3 rounded-md bg-[#2a527d] hover:bg-[#1e3a5f] text-white font-extrabold shadow">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

@include('landing.partials.footer')
@endsection
