@extends('layouts.app')

@section('content')
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-gutter mt-8 md:mt-[30px]">

        <div class="flex flex-col gap-gutter">

            <div class="brutal-container bg-accent-yellow p-8 md:p-10 lg:p-12 flex flex-col justify-between h-full min-h-[350px] lg:min-h-[450px] gap-4 md:gap-6">
                <h1 class="text-h1 font-h1 uppercase leading-none tracking-tight lg:text-[3rem] z-10 relative">Pusat Susu Segar Cipageran</h1>

                <div class="flex-grow flex items-center justify-center py-4 relative z-0">
                    <img src="{{ asset('assets/images/all_product_images.png') }}" alt="Susu Segar Cipageran" class="w-32 md:w-48 lg:w-56 h-auto object-contain hover:scale-110 transition-transform duration-500 drop-shadow-[0_10px_10px_rgba(0,0,0,0.1)]">
                </div>

                <p class="text-body-lg font-body-lg max-w-md z-10 relative">Jelajahi kesegaran susu langsung dari peternak lokal. Kualitas terbaik, langsung ke tangan Anda.</p>
            </div>

            <a href="#katalog" class="brutal-container bg-accent-pink px-8 py-6 w-full brutal-hover flex items-center justify-between group">
                <span class="text-h2 font-h2 uppercase text-2xl lg:text-3xl">Lihat Katalog</span>
                <div class="bg-black text-white rounded-full w-12 h-12 flex items-center justify-center transition-transform group-hover:scale-110 group-hover:-rotate-45">
                    <span class="material-symbols-outlined font-bold text-2xl">arrow_forward</span>
                </div>
            </a>
        </div>

        <div class="brutal-container bg-accent-green p-6 lg:p-8 min-h-[400px] lg:min-h-0 relative overflow-hidden flex items-center justify-center">

            <div class="w-[85%] h-[85%] relative z-10">
                <img src="{{ asset('assets/images/cow_images.jpg') }}" alt="Sapi Cipageran" class="w-full h-full object-cover brutal-container">
            </div>
        </div>
    </section>

    <section id="katalog" class="pt-16 md:pt-20">
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-end gap-6 mb-10 lg:mb-12">
            <h2 class="text-h1 font-h1 uppercase text-4xl lg:text-[3rem] tracking-tight leading-none text-black">Menu Kami</h2>
            <div class="flex flex-wrap gap-4">
                <button class="brutal-container !rounded-lg bg-accent-yellow p-1.5 pr-6 font-label-bold uppercase text-sm brutal-hover flex items-center gap-3">
                    <div class="bg-[#9bc0f6] border-[3px] border-black rounded-md w-10 h-8 flex items-center justify-center">
                        <span class="material-symbols-outlined text-lg">grid_view</span>
                    </div>
                    <span class="pt-0.5">Semua</span>
                </button>
                <button class="brutal-container !rounded-lg bg-surface-white p-1.5 pr-6 font-label-bold uppercase text-sm brutal-hover flex items-center gap-3">
                    <div class="bg-[#9bc0f6] border-[3px] border-black rounded-md w-10 h-8 flex items-center justify-center">
                        <span class="text-base">🥛</span>
                    </div>
                    <span class="pt-0.5">Susu Segar</span>
                </button>
                <button class="brutal-container !rounded-lg bg-surface-white p-1.5 pr-6 font-label-bold uppercase text-sm brutal-hover flex items-center gap-3">
                    <div class="bg-[#9bc0f6] border-[3px] border-black rounded-md w-10 h-8 flex items-center justify-center">
                        <span class="text-base">🥤</span>
                    </div>
                    <span class="pt-0.5">Yoghurt</span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter">
            @php
                $bgColors = ['bg-accent-green', 'bg-accent-pink', 'bg-accent-purple', 'bg-accent-yellow'];
            @endphp

            @foreach($products as $index => $product)
                @include('components.product-card', [
                    'product' => $product,
                    'bgColor' => $bgColors[$index % count($bgColors)]
                ])
            @endforeach
        </div>
    </section>

    <section id="lokasi" class="mt-16">
        <div class="brutal-container bg-accent-green p-8 md:p-12 flex flex-col md:flex-row items-stretch justify-between gap-8 relative overflow-hidden">
            <div class="w-full md:w-1/2 brutal-container bg-surface-dim min-h-[300px] flex items-center justify-center relative bg-slate-200">
                <div class="flex flex-col items-center gap-2">
                    <span class="material-symbols-outlined text-6xl">location_on</span>
                    <span class="text-label-bold font-label-bold uppercase text-center">Peta Lokasi Cipageran</span>
                </div>
            </div>
            <div class="w-full md:w-1/2 space-y-6 flex flex-col justify-center">
                <h2 class="text-h1 font-h1 uppercase">KUNJUNGI SENTRA KAMI</h2>
                <p class="text-body-lg font-body-lg">Berdiri sejak 2014, Sentra Susu Cipageran menjadi pusat produksi olahan susu terbaik. Kunjungi kami untuk melihat kualitas standarisasi secara langsung.</p>
                <button class="brutal-container bg-surface-white px-8 py-4 brutal-hover text-label-bold font-label-bold uppercase flex items-center gap-2 w-fit">
                    Buka di Maps
                    <span class="material-symbols-outlined">map</span>
                </button>
            </div>
        </div>
    </section>
@endsection
