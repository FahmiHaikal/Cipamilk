{{-- Container Kartu Produk Modern --}}
<article class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full border border-gray-100 hover:shadow-lg transition-shadow duration-300">

    {{-- Bagian Atas: Gambar dengan Latar Belakang Abu-abu Terang --}}
    <div class="bg-gray-100 rounded-t-lg p-4 flex items-center justify-center h-48 relative">
        <a href="{{ route('product.detail', $product) }}" class="w-full h-full flex items-center justify-center hover:scale-105 transition-transform duration-300" aria-label="Lihat detail {{ $product->nama_produk }}">
            <img src="{{ asset($product->image) }}" alt="{{ $product->nama_produk }}" class="w-full h-auto object-contain">
        </a>
        {{-- Overlay FLASH SALE (posisi absolut) --}}
        <div class="absolute top-2 right-2 flex items-center gap-1">
            <span class="material-symbols-outlined text-orange-500 text-sm">bolt</span>
            <span class="text-xs font-bold text-black italic">FLASH SALE</span>
        </div>
    </div>

    {{-- Banner Diskon --}}
    <div class="bg-orange-500 text-white text-center py-2 px-4">
        <span class="text-sm font-semibold">DISKON 20%</span>
    </div>

    {{-- Bagian Bawah: Detail Teks --}}
    <div class="px-5 py-6 flex-grow space-y-3">

        {{-- Judul Produk --}}
        <h3 class="text-xl font-bold text-gray-900">
            <a href="{{ route('product.detail', $product) }}" class="hover:text-orange-500 transition-colors">
                {{ $product->nama_produk }}
            </a>
        </h3>

        {{-- Detail Produk/Varian (Menggunakan deskripsi yang dipotong) --}}
        <p class="text-sm text-gray-600">
            {{ Str::limit($product->deskripsi, 110) }}
        </p>

        {{-- Kategori (Baris Baru, menggunakan kategori dari database atau statis untuk demo) --}}
        <div class="flex items-center text-xs text-gray-500 gap-1">
            <span>Footwear</span>
            <span>·</span>
            <span>Sepatu</span>
        </div>

        {{-- Rating (Baris Baru, statis untuk demo) --}}
        <div class="flex items-center gap-1">
            <span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
            <span class="text-sm text-gray-500">4.9</span>
        </div>

        {{-- Harga & UMKM (Baris Baru) --}}
        <div class="flex flex-col gap-1">
            @php
                // Menghitung harga baru dengan asumsi diskon 20%
                $originalPrice = $product->harga;
                $discountPercentage = 20; // Persentase diskon
                $discountedPrice = $originalPrice * (1 - ($discountPercentage / 100));
            @endphp
            {{-- Harga Lama Coret & UMKM --}}
            <div class="flex items-center justify-between text-sm text-gray-500">
                <span class="line-through">Rp {{ number_format($originalPrice, 0, ',', '.') }}</span>
                <span class="text-xs text-gray-500">UMKM {{ $product->umkm->nama_umkm ?? 'Cipageran' }}</span>
            </div>
            {{-- Harga Baru Oranye Tebal --}}
            <span class="text-2xl font-bold text-orange-500">Rp {{ number_format($discountedPrice, 0, ',', '.') }}</span>
        </div>
    </div>
</article>