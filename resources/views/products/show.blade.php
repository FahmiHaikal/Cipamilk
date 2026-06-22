@extends('layouts.app')

@section('title', $product->nama_produk . ' - Super Susu Cipageran')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 md:mt-10 mb-20 space-y-8">
        
        <!-- Breadcrumb (Navigasi Khas Marketplace) -->
        <nav class="flex text-sm text-gray-500 font-medium">
            <a href="{{ url('/') }}" class="hover:text-green-600 transition-colors">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ url('/#katalog') }}" class="hover:text-green-600 transition-colors">Katalog</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900">{{ $product->nama_produk }}</span>
        </nav>

        <!-- Container Utama: Detail Produk -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[1fr_1.2fr]">
                
                <!-- Kiri: Foto Produk -->
                <div class="p-6 md:p-8 lg:p-10 bg-gray-50 flex flex-col justify-center items-center relative">
                    <img
                        src="{{ asset('assets/' . $product->image) }}"
                        alt="{{ $product->nama_produk }}"
                        class="w-full max-w-sm h-auto object-contain hover:scale-105 transition-transform duration-300"
                    >
                    <!-- Label Halal/Higienis Khas Cipageran -->
                    <div class="absolute top-6 left-6 bg-white/80 backdrop-blur-sm border border-gray-200 px-3 py-1.5 rounded-full flex items-center gap-1 shadow-sm">
                        <span class="material-symbols-outlined text-green-500 text-sm">verified</span>
                        <span class="text-xs font-bold text-green-700">Terverifikasi</span>
                    </div>
                </div>

                <!-- Kanan: Informasi Produk & Checkout -->
                <div class="p-6 md:p-8 lg:p-10 flex flex-col">
                    
                    <div class="mb-2">
                        <span class="inline-block px-3 py-1 bg-green-50 text-green-600 rounded-full text-xs font-bold tracking-wider uppercase border border-green-100">
                            {{ $product->kategori }}
                        </span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 leading-tight mb-2">
                        {{ $product->nama_produk }}
                    </h1>

                    <!-- Rating & Terjual -->
                    <div class="flex items-center gap-4 mb-6 text-sm">
                        <div class="flex items-center text-yellow-400">
                            <span class="material-symbols-outlined text-lg">star</span>
                            <span class="text-gray-700 font-medium ml-1">{{ $product->rating ?? '4.8' }}</span>
                        </div>
                        <div class="w-1 h-1 bg-gray-300 rounded-full"></div>
                        <span class="text-gray-500">Terjual {{ $product->terjual ?? '100+' }}</span>
                    </div>

                    <!-- Harga (Logika Diskon Diperbaiki) -->
                    <div class="mb-6 pb-6 border-b border-gray-100">
                        @if(isset($product->diskon) && $product->diskon > 0)
                            @php $hargaDiskon = $product->harga - ($product->harga * ($product->diskon / 100)); @endphp
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-xs bg-red-100 text-red-600 font-bold px-1.5 py-0.5 rounded">{{ $product->diskon }}%</span>
                                <span class="text-sm text-gray-400 line-through">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                            </div>
                            <p class="text-3xl font-extrabold text-orange-500">Rp {{ number_format($hargaDiskon, 0, ',', '.') }}</p>
                        @else
                            <p class="text-3xl font-extrabold text-gray-900">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        @endif
                    </div>

                    <!-- Deskripsi & Spesifikasi -->
                    <div class="flex-grow space-y-4 mb-8">
                        <div>
                            <h3 class="text-sm font-bold text-gray-900 mb-2">Deskripsi Produk</h3>
                            <p class="text-sm text-gray-600 leading-relaxed">{{ $product->deskripsi }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4 bg-gray-50 p-4 rounded-xl border border-gray-100">
                            @if($product->masa_simpan)
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wider">Masa Simpan</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $product->masa_simpan }}</p>
                                </div>
                            @endif
                            @if($product->label_gizi)
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wider">Kandungan/Label</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $product->label_gizi }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Logika WhatsApp Checkout -->
                    @php
                        // Membersihkan nomor WA (Ubah awalan 0 menjadi 62)
                        $waNumber = preg_replace('/^0/', '62', $product->umkm->whatsapp);
                        $waNumber = preg_replace('/[^0-9]/', '', $waNumber);

                        // Merakit template pesan
                        $pesan = "Halo " . $product->umkm->pemilik . " (" . $product->umkm->nama_umkm . "),\n";
                        $pesan .= "Saya melihat produk Anda di Web Super Susu Cipageran.\n\n";
                        $pesan .= "Saya tertarik untuk memesan *" . $product->nama_produk . "*.\n";
                        $pesan .= "Apakah stoknya masih tersedia?";
                    @endphp

                    <!-- Tombol Action (Dengan Autentikasi) -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        @auth
                            <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode($pesan) }}" target="_blank" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-bold py-3.5 px-6 rounded-xl flex items-center justify-center gap-2 transition-all shadow-md hover:shadow-lg">
                                <span class="material-symbols-outlined">chat</span>
                                Beli via WhatsApp
                            </a>
                            <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="bg-white border border-green-600 text-green-600 hover:bg-green-50 font-bold py-3.5 px-6 rounded-xl flex items-center justify-center transition-all">
                                Tanya Penjual
                            </a>
                        @endauth

                        @guest
                            <a href="{{ route('login') }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-bold py-3.5 px-6 rounded-xl flex items-center justify-center gap-2 transition-all shadow-md hover:shadow-lg">
                                <span class="material-symbols-outlined">lock</span>
                                Login untuk Membeli
                            </a>
                            <a href="{{ route('login') }}" class="bg-white border border-green-600 text-green-600 hover:bg-green-50 font-bold py-3.5 px-6 rounded-xl flex items-center justify-center transition-all">
                                <span class="material-symbols-outlined mr-2">lock</span>
                                Login untuk Bertanya
                            </a>
                            <p class="w-full text-center text-xs text-gray-500 mt-2 sm:hidden">
                                *Silakan masuk/daftar untuk menghubungi penjual.
                            </p>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

        <!-- Profil UMKM (Bug Tag <a> Diperbaiki) -->
        <section class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center border-2 border-green-200">
                    <span class="material-symbols-outlined text-3xl">storefront</span>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-900 flex items-center gap-1">
                        {{ $product->umkm->nama_umkm }}
                        <span class="material-symbols-outlined text-green-500 text-sm" title="Mitra Resmi Cipageran">verified</span>
                    </h2>
                    <p class="text-sm text-gray-500 flex items-center gap-1 mt-1">
                        <span class="material-symbols-outlined text-sm">location_on</span>
                        {{ $product->umkm->alamat ?? 'Sentra Susu Cipageran' }}
                    </p>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <a href="{{ route('umkm.detail', $product->umkm) }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-full text-sm font-bold hover:bg-gray-50 hover:border-gray-400 transition-all text-center">
                    Kunjungi UMKM
                </a>
            </div>
        </section>

        <!-- Produk Terkait (Path Gambar Diperbaiki) -->
        @if($relatedProducts->isNotEmpty())
            <section class="pt-8">
                <div class="flex items-end justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-900">Mungkin Anda Suka</h2>
                    <a href="{{ url('/#katalog') }}" class="text-sm font-semibold text-green-600 hover:text-green-700">Lihat Semua</a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @foreach($relatedProducts as $relatedProduct)
                        <a href="{{ route('product.detail', $relatedProduct) }}" class="bg-white rounded-xl border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group flex flex-col">
                            <div class="bg-gray-50 aspect-square p-4 flex items-center justify-center">
                                <img src="{{ asset('assets/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->nama_produk }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="p-3 flex flex-col flex-grow">
                                <h3 class="text-sm text-gray-700 truncate mb-1">{{ $relatedProduct->nama_produk }}</h3>
                                
                                @if(isset($relatedProduct->diskon) && $relatedProduct->diskon > 0)
                                    @php $hargaRel = $relatedProduct->harga - ($relatedProduct->harga * ($relatedProduct->diskon / 100)); @endphp
                                    <p class="text-sm font-bold text-orange-500 mb-1">Rp {{ number_format($hargaRel, 0, ',', '.') }}</p>
                                    <div class="flex items-center gap-1">
                                        <span class="text-[10px] bg-red-100 text-red-600 px-1 rounded">{{ $relatedProduct->diskon }}%</span>
                                        <span class="text-[10px] text-gray-400 line-through">Rp {{ number_format($relatedProduct->harga, 0, ',', '.') }}</span>
                                    </div>
                                @else
                                    <p class="text-sm font-bold text-gray-900 mt-auto">Rp {{ number_format($relatedProduct->harga, 0, ',', '.') }}</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
@endsection