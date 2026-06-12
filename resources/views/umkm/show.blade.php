@extends('layouts.app')

@section('title', $umkm->nama_umkm . ' - Super Susu Cipageran')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 md:mt-10 mb-20 space-y-8">
    
    <!-- 1. Breadcrumb -->
    <nav class="flex text-sm text-gray-500 font-medium">
        <a href="{{ url('/') }}" class="hover:text-green-600 transition-colors">Beranda</a>
        <span class="mx-2">/</span>
        <a href="{{ url('/#mitra-umkm') }}" class="hover:text-green-600 transition-colors">Mitra UMKM</a>
        <span class="mx-2">/</span>
        <span class="text-gray-900">{{ $umkm->nama_umkm }}</span>
    </nav>

    <!-- 2. Header / Banner Toko -->
    <section class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden relative">
        <!-- Background Banner -->
        <div class="h-32 md:h-48 bg-gradient-to-r from-green-600 to-green-400 relative">
            <!-- Pattern Dekorasi -->
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        </div>

        <!-- Detail Profil -->
        <div class="px-6 md:px-10 pb-8 relative">
            <div class="flex flex-col md:flex-row gap-6 items-start md:items-end -mt-12 md:-mt-16 mb-6">
                <!-- Foto Profil / Ikon Toko -->
                <div class="w-24 h-24 md:w-32 md:h-32 bg-white rounded-full p-2 shadow-md border border-gray-100 shrink-0">
                    <div class="w-full h-full bg-green-50 rounded-full flex items-center justify-center text-green-600">
                        <span class="material-symbols-outlined text-4xl md:text-5xl">storefront</span>
                    </div>
                </div>

                <!-- Info Utama -->
                <div class="flex-grow pt-14 md:pt-0">
                    <div class="flex items-center gap-2 mb-1">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $umkm->nama_umkm }}</h1>
                        <span class="material-symbols-outlined text-green-500 text-xl" title="Mitra Resmi KKN">verified</span>
                    </div>
                    <div class="flex flex-wrap items-center gap-y-2 gap-x-6 text-sm text-gray-600 mt-2">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">person</span>
                            <span class="font-medium text-gray-800">{{ $umkm->pemilik ?? 'Pemilik UMKM' }}</span>
                        </div>
                        @if($umkm->alamat)
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">location_on</span>
                            <span>{{ $umkm->alamat }}</span>
                        </div>
                        @endif
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">inventory_2</span>
                            <span>{{ $umkm->products->count() }} Produk</span>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi Kanan -->
                @php
                    // Membersihkan nomor WA
                    $waNumber = preg_replace('/^0/', '62', $umkm->whatsapp);
                    $waNumber = preg_replace('/[^0-9]/', '', $waNumber);
                    $pesan = "Halo " . $umkm->pemilik . " (" . $umkm->nama_umkm . "),\nSaya melihat toko Anda di Web Super Susu Cipageran dan ingin bertanya-tanya seputar produk Anda.";
                @endphp
                <div class="w-full md:w-auto flex shrink-0">
                    <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode($pesan) }}" target="_blank" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-xl flex items-center justify-center gap-2 transition-all shadow-sm">
                        <span class="material-symbols-outlined">chat</span>
                        Hubungi Penjual
                    </a>
                </div>
            </div>

            <!-- Cerita / Deskripsi UMKM -->
            @if($umkm->story)
            <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                <h3 class="text-xs font-bold text-gray-900 uppercase tracking-wider mb-2">Tentang UMKM</h3>
                <p class="text-sm text-gray-600 leading-relaxed">{{ $umkm->story }}</p>
            </div>
            @endif
        </div>
    </section>

    <!-- 3. Daftar Produk Spesifik UMKM -->
    <section>
        <div class="flex items-center gap-2 mb-6 border-b border-gray-200 pb-4">
            <span class="material-symbols-outlined text-green-600 text-2xl">local_mall</span>
            <h2 class="text-xl font-bold text-gray-900">Etalase Produk</h2>
        </div>

        @if($umkm->products->isEmpty())
            <div class="bg-gray-50 rounded-2xl p-12 text-center border border-gray-100">
                <span class="material-symbols-outlined text-5xl text-gray-300 mb-3 block">inventory_2</span>
                <h3 class="text-lg font-bold text-gray-900 mb-1">Belum Ada Produk</h3>
                <p class="text-gray-500 text-sm">UMKM ini belum menambahkan produk ke dalam katalog.</p>
            </div>
        @else
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @foreach($umkm->products as $product)
                    <a href="{{ route('product.detail', $product) }}" class="bg-white rounded-xl border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group flex flex-col h-full relative">
                        <!-- Gambar Produk -->
                        <div class="bg-gray-50 aspect-square p-4 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->nama_produk }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                        </div>

                        <!-- Banner Diskon -->
                        @if(isset($product->diskon) && $product->diskon > 0)
                            <div class="absolute top-2 right-2 bg-red-500 text-white py-0.5 px-2 rounded-full text-[10px] font-bold shadow-sm">
                                -{{ $product->diskon }}%
                            </div>
                        @endif

                        <!-- Info Produk -->
                        <div class="p-4 flex flex-col flex-grow">
                            <h3 class="text-sm font-semibold text-gray-800 truncate mb-1 group-hover:text-green-600 transition-colors">{{ $product->nama_produk }}</h3>
                            <p class="text-[10px] text-gray-500 uppercase mb-2">{{ $product->kategori }}</p>
                            
                            <div class="flex-grow"></div>

                            <!-- Harga -->
                            <div class="mt-2 pt-2 border-t border-gray-50">
                                @if(isset($product->diskon) && $product->diskon > 0)
                                    @php $hargaDiskon = $product->harga - ($product->harga * ($product->diskon / 100)); @endphp
                                    <p class="text-[11px] text-gray-400 line-through mb-0.5">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                                    <p class="text-base font-bold text-orange-500">Rp {{ number_format($hargaDiskon, 0, ',', '.') }}</p>
                                @else
                                    <p class="text-base font-bold text-gray-900 mt-3">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </section>

    <!-- 4. Bagian Artikel / Jurnal UMKM -->
    <section class="mt-12">
        <div class="flex items-center gap-2 mb-6 border-b border-gray-200 pb-4">
            <span class="material-symbols-outlined text-green-600 text-2xl">article</span>
            <h2 class="text-xl font-bold text-gray-900">Jurnal & Prestasi {{ $umkm->nama_umkm }}</h2>
        </div>

        @if($umkm->articles->isEmpty())
            <div class="bg-gray-50 rounded-2xl p-8 text-center border border-gray-100">
                <p class="text-gray-500 text-sm">Belum ada jurnal atau berita yang diterbitkan oleh UMKM ini.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($umkm->articles as $article)
                    <article class="bg-white rounded-2xl overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow flex flex-col">
                        <div class="aspect-video bg-gray-100 relative overflow-hidden">
                            <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://placehold.co/600x400/e2e8f0/475569?text=Berita' }}" 
                                 alt="{{ $article->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <span class="text-xs font-semibold text-gray-400 mb-2">
                                {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}
                            </span>
                            <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2">
                                <a href="{{ route('article.detail', $article) }}" class="hover:text-green-600 transition-colors">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            <div class="flex-grow"></div>
                            <a href="{{ route('article.detail', $article) }}" class="text-green-600 font-semibold text-sm flex items-center gap-1 hover:text-green-700 mt-4">
                                Baca selengkapnya <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>

</div>
@endsection