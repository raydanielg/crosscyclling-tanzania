@extends('landing.layout')

@section('body')
@include('landing.partials.header')

@php
    $images = [
        'images/Highlights/DEE_0975.jpg',
        'images/Highlights/DEE_0977.jpg',
        'images/Highlights/DEE_0978.jpg',
        'images/Highlights/DEE_0986.jpg',
        'images/Highlights/DEE_0999.jpg',
        'images/Highlights/DEE_1006.jpg',
        'images/Highlights/DEE_1017.jpg',
        'images/Highlights/DEE_1029.jpg',
        'images/Highlights/DEE_1033.jpg',
        'images/Highlights/DEE_1048.jpg',
        'images/Highlights/DEE_1089.jpg',
        'images/Highlights/DEE_1095.jpg',
        'images/Highlights/DEE_1116.jpg',
        'images/Highlights/DEE_1131.jpg',
        'images/Highlights/DEE_1146.jpg',
        'images/Highlights/DEE_1148.jpg',
        'images/Highlights/DEE_1154.jpg',
        'images/Highlights/DEE_1156.jpg',
        'images/Highlights/DEE_1208.jpg',
        'images/Highlights/DEE_1219.jpg',
        'images/Highlights/DEE_1227.jpg',
    ];
@endphp

<main
    x-data="{
        open: false,
        idx: 0,
        images: @js($images),
        show(i) {
            this.idx = i;
            this.open = true;
        },
        close() {
            this.open = false;
        },
        prev() {
            this.idx = (this.idx - 1 + this.images.length) % this.images.length;
        },
        next() {
            this.idx = (this.idx + 1) % this.images.length;
        }
    }"
>
    <section class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                <div>
                    <div class="text-xs font-extrabold uppercase tracking-widest text-[#2a527d]">Gallery</div>
                    <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">Highlights & Moments</h1>
                    <p class="mt-2 text-gray-600">Picha za matukio, safari, na mafanikio ya jamii ya baiskeli Tanzania.</p>
                </div>

                <nav class="text-sm text-gray-600">
                    <a href="{{ url('/') }}" class="font-bold text-gray-700 hover:text-[#2a527d] no-underline hover:no-underline">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-500">Gallery</span>
                </nav>
            </div>
        </div>
    </section>

    <section class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($images as $i => $img)
                    <button
                        type="button"
                        @click="show({{ $i }})"
                        class="group aspect-square rounded-2xl overflow-hidden bg-white border border-gray-200 shadow-sm hover:shadow-md transition"
                    >
                        <img src="{{ asset($img) }}" alt="Gallery" class="w-full h-full object-cover group-hover:scale-[1.02] transition" />
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <div
        x-show="open"
        x-transition
        x-cloak
        class="fixed inset-0 z-[60] bg-black/80 backdrop-blur-sm flex items-center justify-center p-4"
        @keydown.escape.window="close()"
    >
        <div class="absolute inset-0" @click="close()"></div>

        <div class="relative w-full max-w-5xl">
            <div class="relative rounded-3xl overflow-hidden border border-white/10 bg-black">
                <img :src="images[idx]" alt="Preview" class="w-full max-h-[80vh] object-contain bg-black" />

                <button
                    type="button"
                    class="absolute top-4 right-4 h-10 w-10 rounded-full bg-white/10 border border-white/20 text-white hover:bg-white/15"
                    @click="close()"
                >
                    <span class="sr-only">Close</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <button
                    type="button"
                    class="absolute left-4 top-1/2 -translate-y-1/2 h-11 w-11 rounded-full bg-white/10 border border-white/20 text-white hover:bg-white/15"
                    @click.stop="prev()"
                >
                    <span class="sr-only">Previous</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 15.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 111.414 1.414L8.414 10l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <button
                    type="button"
                    class="absolute right-4 top-1/2 -translate-y-1/2 h-11 w-11 rounded-full bg-white/10 border border-white/20 text-white hover:bg-white/15"
                    @click.stop="next()"
                >
                    <span class="sr-only">Next</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.293a1 1 0 011.414 0l5-5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M7.293 5.707a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5-5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="mt-4 flex items-center justify-between text-white/80 text-xs">
                <div class="font-bold">Image</div>
                <div><span x-text="idx + 1"></span> / <span x-text="images.length"></span></div>
            </div>
        </div>
    </div>
</main>

@include('landing.partials.footer')
@endsection
