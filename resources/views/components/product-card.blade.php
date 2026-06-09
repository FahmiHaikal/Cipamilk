<article class="brutal-container bg-surface-white flex flex-col md:flex-row overflow-hidden h-full">

    <div class="flex-1 flex flex-col">
        <div class="px-5 py-4 border-b-[3px] border-border-primary {{ $bgColor }}">
            <h3 class="text-h2 font-h2 text-xl lg:text-2xl uppercase tracking-normal leading-tight text-black">
                <a href="{{ route('product.detail', ['product' => $product->slug]) }}" class="hover:text-primary transition-colors">
                    {{ $product->nama_produk }}
                </a>
            </h3>
        </div>

        <div class="px-5 py-6 flex-grow bg-white flex flex-col justify-center space-y-4">
            <div class="flex flex-col gap-2 sm:flex-row sm:justify-between sm:items-start">
                <span class="text-label-bold font-label-bold text-xs uppercase text-gray-700">
                    {{ $product->umkm->nama_umkm ?? 'Cipageran' }}
                </span>

                <span class="text-h2 font-h2 text-xl leading-none">
                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                </span>
            </div>

            <p class="text-body-md font-body-md text-sm leading-relaxed text-gray-700">
                {{ Str::limit($product->deskripsi, 110) }}
            </p>
        </div>

        <a href="{{ route('product.detail', ['product' => $product->slug]) }}"
           class="bg-accent-purple px-5 py-4 text-label-bold font-label-bold uppercase flex justify-between items-center border-t-[3px] border-border-primary w-full text-black hover:bg-accent-pink transition-colors cursor-pointer group">
            <span class="text-sm">Lihat Detail</span>

            <span class="material-symbols-outlined font-bold group-hover:translate-x-1 transition-transform">
                arrow_forward
            </span>
        </a>
    </div>

    <div class="w-full md:w-[45%] {{ $bgColor }} p-4 flex items-center justify-center min-h-[220px]">
        <a href="{{ route('product.detail', ['product' => $product->slug]) }}"
           class="w-full h-full flex items-center justify-center hover:scale-105 transition-transform duration-300"
           aria-label="Lihat detail {{ $product->nama_produk }}">

            @if($product->image)
                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->nama_produk }}"
                    class="w-[82%] md:w-[92%] max-w-[250px] h-auto object-contain drop-shadow-[0_12px_12px_rgba(0,0,0,0.12)]"
                >
            @else
                <img
                    src="{{ asset('assets/images/products/default-product.png') }}"
                    alt="{{ $product->nama_produk }}"
                    class="w-[82%] md:w-[92%] max-w-[250px] h-auto object-contain drop-shadow-[0_12px_12px_rgba(0,0,0,0.12)]"
                >
            @endif

        </a>
    </div>

</article>
