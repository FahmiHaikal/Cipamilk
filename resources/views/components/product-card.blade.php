<div class="brutal-container bg-surface-white flex flex-col md:flex-row overflow-hidden h-full">

    <div class="flex flex-col w-full md:w-[55%] border-b-[3px] md:border-b-0 md:border-r-[3px] border-border-primary">

        <div class="px-5 py-4 border-b-[3px] border-border-primary {{ $bgColor }}">
            <h3 class="text-h2 font-h2 text-xl lg:text-2xl uppercase tracking-tight text-black">{{ $product->nama_produk }}</h3>
        </div>

        <div class="px-5 py-6 flex-grow bg-white flex flex-col justify-center space-y-4">
            <div class="flex justify-between items-start">
                <span class="text-label-bold font-label-bold text-sm uppercase text-gray-800">{{ $product->umkm->nama_umkm ?? 'Cipageran' }}</span>
                @if($product->discount_price)

                    <div class="flex flex-col items-end">
                        <span class="text-xs text-gray-500 line-through">
                            Rp {{ number_format($product->harga / 1000, 0, ',', '.') }}k
                        </span>

                        <span class="text-h2 font-h2 text-xl text-red-600">
                            Rp {{ number_format($product->discount_price / 1000, 0, ',', '.') }}k
                        </span>
                    </div>

                @else

                    <span class="text-h2 font-h2 text-xl">
                        Rp {{ number_format($product->harga / 1000, 0, ',', '.') }}k
                    </span>

                @endif
            </div>
            <p class="text-label-bold font-label-bold text-[11px] leading-relaxed text-gray-600">
                {{ Str::limit($product->deskripsi, 90) }}
            </p>
        </div>

        @php
            $waText = urlencode("Halo {$product->umkm->nama_umkm}, saya ingin memesan {$product->nama_produk}");
        @endphp
        <a href="https://wa.me/{{ $product->umkm->whatsapp ?? '' }}?text={{ $waText }}" target="_blank" class="bg-[#E4A2FA] px-5 py-4 text-label-bold font-label-bold uppercase flex justify-between items-center border-t-[3px] border-border-primary w-full text-black hover:bg-[#d889f0] transition-colors cursor-pointer group">
            <span class="text-sm">Pesan via WA</span>
            <span class="material-symbols-outlined font-bold group-hover:translate-x-1 transition-transform">arrow_forward</span>
        </a>
    </div>

    <div class="w-full md:w-[45%] {{ $bgColor }} p-4 flex items-center justify-center min-h-[220px]">
        <div class="w-full h-full flex items-center justify-center hover:scale-110 transition-transform duration-300">
            @php
                $name = strtolower($product->nama_produk);
                $img = Str::slug($product->nama_produk, '_') . '_image_products.png';

                if (str_contains($name, 'pasteurisasi') || str_contains($name, 'susu segar')) {
                    $img = 'susu_pasteurisasi_segar_image_products.png';
                } elseif (str_contains($name, 'es lilin')) {
                    $img = 'es_lilin_yogurth_image_products.png';
                } elseif (str_contains($name, 'yoghurt') || str_contains($name, 'ciyo') || str_contains($name, 'cio')) {
                    $img = 'yoghurt_botol_ciyo_image_products.png';
                } elseif (str_contains($name, 'keju') || str_contains($name, 'mozarella')) {
                    $img = 'keju_mozarella_lokal_image_products.png';
                } elseif (str_contains($name, 'pie')) {
                    $img = 'pie_susu_lembang_image_products.png';
                }
            @endphp
            <img src="{{ asset('assets/images/products/' . $img) }}" alt="{{ $product->nama_produk }}" class="w-[85%] md:w-[95%] max-w-[260px] h-auto object-contain">
        </div>
    </div>
</div>
