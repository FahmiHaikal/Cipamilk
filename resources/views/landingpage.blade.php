@extends('layouts.app')

@section('content')

    <section id="katalog" class="pt-16 md:pt-20">
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-end gap-6 mb-10 lg:mb-12">
            <h2 class="text-h1 font-h1 uppercase text-4xl lg:text-[3rem] tracking-tight leading-none text-black">Produk UMKM</h2>
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

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
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
@endsection
