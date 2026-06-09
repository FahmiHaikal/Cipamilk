@extends('layouts.app')

@section('title', $product->nama_produk . ' - CipaMilk')

@section('content')
    <div class="max-w-5xl mx-auto mt-6 md:mt-10 space-y-6">
        <div class="flex flex-wrap gap-3">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 rounded-xl border-[3px] border-border-primary bg-surface-white px-4 py-2 text-sm font-label-bold uppercase shadow-[4px_4px_0px_0px_#000000] transition-all hover:translate-x-1 hover:translate-y-1 hover:shadow-none">
                <span class="material-symbols-outlined text-lg">home</span>
                Beranda
            </a>
            <a href="{{ url('/#katalog') }}" class="inline-flex items-center gap-2 rounded-xl border-[3px] border-border-primary bg-accent-yellow px-4 py-2 text-sm font-label-bold uppercase shadow-[4px_4px_0px_0px_#000000] transition-all hover:translate-x-1 hover:translate-y-1 hover:shadow-none">
                <span class="material-symbols-outlined text-lg">grid_view</span>
                Katalog
            </a>
        </div>

        <article class="brutal-container bg-surface-white overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-[0.95fr_1.05fr]">
                <div class="aspect-[4/3] md:aspect-auto bg-accent-green p-6 sm:p-8 flex items-center justify-center border-b-[3px] md:border-b-0 md:border-r-[3px] border-border-primary">
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->nama_produk }}"
                        class="h-full max-h-[330px] w-full object-contain drop-shadow-[0_16px_18px_rgba(0,0,0,0.14)]"
                    >
                </div>

                <div class="bg-white px-5 py-7 sm:px-7 sm:py-8">
                    <div class="space-y-3">
                        <p class="w-fit rounded-full border-2 border-border-primary bg-accent-yellow px-3 py-1 text-xs font-label-bold uppercase tracking-normal">
                            {{ $product->kategori }}
                        </p>

                        <h1 class="text-3xl font-h1 leading-tight text-text-primary sm:text-4xl md:text-5xl">
                            {{ $product->nama_produk }}
                        </h1>

                        <p class="text-2xl font-h2 text-primary sm:text-3xl">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="mt-6 space-y-5 text-base leading-7 text-gray-700">
                        <p>{{ $product->deskripsi }}</p>

                        <dl class="divide-y-[3px] divide-border-primary border-y-[3px] border-border-primary">
                            @if($product->masa_simpan)
                                <div class="py-4">
                                    <dt class="text-xs font-label-bold uppercase text-gray-500">Masa Simpan</dt>
                                    <dd class="mt-1 font-body-lg text-text-primary">{{ $product->masa_simpan }}</dd>
                                </div>
                            @endif

                            @if($product->label_gizi)
                                <div class="py-4">
                                    <dt class="text-xs font-label-bold uppercase text-gray-500">Label Produk</dt>
                                    <dd class="mt-1 font-body-lg text-text-primary">{{ $product->label_gizi }}</dd>
                                </div>
                            @endif
                        </dl>
                    </div>
                </div>
            </div>
        </article>

        <section class="brutal-container bg-surface-white px-5 py-6 sm:px-7">
            <p class="text-xs font-label-bold uppercase text-gray-500">Diproduksi oleh</p>
            <h2 class="mt-2 text-2xl font-h2 leading-tight text-text-primary">
                {{ $product->umkm->nama_umkm }}
            </h2>

            <div class="mt-4 space-y-3 text-sm leading-6 text-gray-700">
                @if($product->umkm->story)
                    <p>{{ $product->umkm->story }}</p>
                @endif

                @if($product->umkm->pemilik)
                    <p>
                        <span class="font-label-bold text-text-primary">Pemilik:</span>
                        {{ $product->umkm->pemilik }}
                    </p>
                @endif

                @if($product->umkm->alamat)
                    <p>
                        <span class="font-label-bold text-text-primary">Alamat:</span>
                        {{ $product->umkm->alamat }}
                    </p>
                @endif
            </div>
        </section>

        @if($relatedProducts->isNotEmpty())
            <section class="space-y-4">
                <div class="flex items-end justify-between gap-4">
                    <h2 class="text-2xl font-h2 uppercase leading-tight text-black">Produk Lainnya</h2>
                    <a href="{{ url('/#katalog') }}" class="text-xs font-label-bold uppercase text-black underline decoration-[3px] underline-offset-4">Lihat Semua</a>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    @foreach($relatedProducts as $relatedProduct)
                        <a href="{{ route('product.detail', $relatedProduct) }}" class="brutal-container bg-surface-white overflow-hidden transition-all hover:translate-x-[6px] hover:translate-y-[6px] hover:shadow-none">
                            <div class="aspect-square bg-accent-yellow p-4 flex items-center justify-center border-b-[3px] border-border-primary">
                                <img src="{{ asset($relatedProduct->image) }}" alt="{{ $relatedProduct->nama_produk }}" class="h-full w-full object-contain">
                            </div>
                            <div class="p-4">
                                <p class="text-xs font-label-bold uppercase text-gray-500">{{ $relatedProduct->kategori }}</p>
                                <h3 class="mt-1 text-base font-h2 leading-tight text-black">{{ $relatedProduct->nama_produk }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
@endsection
