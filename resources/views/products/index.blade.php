@extends('layouts.app')

@section('title', 'Katalog Produk - Super Susu Cipageran')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 md:mt-10 mb-20 space-y-8">
    
    <!-- Breadcrumb -->
    <nav class="flex text-sm text-gray-500 font-medium">
        <a href="{{ url('/') }}" class="hover:text-green-600 transition-colors">Beranda</a>
        <span class="mx-2">/</span>
        <span class="text-gray-900">Katalog Produk</span>
    </nav>

    <!-- Header & Fitur Pencarian/Filter -->
    <section class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Semua Produk</h1>
                <p class="text-sm text-gray-500 mt-1">Jelajahi olahan susu segar berkualitas dari sentra kami.</p>
            </div>

            <!-- Form Pencarian & Filter -->
            <form action="{{ route('product.index') }}" method="GET" class="w-full md:w-auto flex flex-col sm:flex-row gap-3">
                
                <!-- Filter Kategori -->
                <div class="relative">
                    <select name="kategori" class="w-full sm:w-40 appearance-none bg-gray-50 border border-gray-200 text-gray-700 py-2.5 px-4 pr-8 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm">
                        <option value="">Semua Kategori</option>
                        @foreach($kategoriList as $kat)
                            <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>
                                {{ $kat }}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                        <span class="material-symbols-outlined text-sm">expand_more</span>
                    </div>
                </div>

                <!-- Input Cari -->
                <div class="relative flex-grow sm:w-64">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="material-symbols-outlined text-gray-400 text-sm">search</span>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..." class="w-full bg-gray-50 border border-gray-200 text-gray-900 py-2.5 pl-10 pr-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm">
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2.5 px-6 rounded-xl transition-colors shadow-sm text-sm flex items-center justify-center gap-1">
                    Cari
                </button>
                
                <!-- Tombol Reset (Muncul jika sedang mencari) -->
                @if(request('search') || request('kategori'))
                    <a href="{{ route('product.index') }}" class="bg-red-50 hover:bg-red-100 text-red-600 font-semibold py-2.5 px-4 rounded-xl transition-colors text-sm flex items-center justify-center" title="Hapus Pencarian">
                        <span class="material-symbols-outlined text-sm">close</span>
                    </a>
                @endif
            </form>
        </div>
    </section>

    <!-- Grid Produk -->
    <section>
        @if($products->isEmpty())
            <!-- Empty State -->
            <div class="bg-gray-50 rounded-2xl p-16 text-center border border-gray-100">
                <span class="material-symbols-outlined text-6xl text-gray-300 mb-4 block">search_off</span>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Produk Tidak Ditemukan</h3>
                <p class="text-gray-500 text-sm max-w-md mx-auto">Maaf, kami tidak menemukan produk yang cocok dengan kata kunci atau filter pencarian Anda.</p>
                <a href="{{ route('product.index') }}" class="inline-block mt-6 px-6 py-2 border border-green-600 text-green-600 rounded-full text-sm font-bold hover:bg-green-50 transition-colors">
                    Lihat Semua Produk
                </a>
            </div>
        @else
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @foreach($products as $product)
                    <a href="{{ route('product.detail', $product) }}" class="bg-white rounded-xl border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group flex flex-col h-full relative">
                        <div class="bg-gray-50 aspect-square p-4 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->nama_produk }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                        </div>

                        @if(isset($product->diskon) && $product->diskon > 0)
                            <div class="absolute top-2 right-2 bg-red-500 text-white py-0.5 px-2 rounded-full text-[10px] font-bold shadow-sm">
                                -{{ $product->diskon }}%
                            </div>
                        @endif

                        <div class="p-4 flex flex-col flex-grow">
                            <h3 class="text-sm font-semibold text-gray-800 truncate mb-1 group-hover:text-green-600 transition-colors">{{ $product->nama_produk }}</h3>
                            <p class="text-[10px] text-gray-500 uppercase mb-2">{{ $product->kategori }}</p>
                            
                            <div class="flex-grow"></div>

                            <div class="mt-2 pt-2 border-t border-gray-50">
                                @if(isset($product->diskon) && $product->diskon > 0)
                                    @php $hargaDiskon = $product->harga - ($product->harga * ($product->diskon / 100)); @endphp
                                    <p class="text-[11px] text-gray-400 line-through mb-0.5">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                                    <p class="text-base font-bold text-orange-500">Rp {{ number_format($hargaDiskon, 0, ',', '.') }}</p>
                                @else
                                    <p class="text-base font-bold text-gray-900 mt-3">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                                @endif
                                <!-- Nama UMKM -->
                                <p class="text-[10px] text-gray-400 mt-1 flex items-center gap-1 truncate">
                                    <span class="material-symbols-outlined text-[10px]">storefront</span>
                                    {{ $product->umkm->nama_umkm }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Bagian Pagination (Angka Halaman) -->
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        @endif
    </section>

</div>
@endsection