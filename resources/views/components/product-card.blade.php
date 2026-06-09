@php
    $stok = $product->stok ?? 0;
    $statusLabel = match(true) {
        $stok === 0  => 'Habis',
        $stok <= 10  => 'Stok Terbatas',
        default      => 'Tersedia',
    };
    $statusClass = match(true) {
        $stok === 0  => 'bg-red-950 text-red-400',
        $stok <= 10  => 'bg-amber-950 text-amber-400',
        default      => 'bg-green-950 text-green-400',
    };
@endphp

<div class="rounded-xl overflow-hidden flex flex-col h-full transition-all duration-150 cursor-pointer"
     style="background: #2a2720; box-shadow: 4px 4px 0px #000; transform: translate(0, 0);"
     onmouseenter="this.style.boxShadow='0px 0px 0px #000'; this.style.transform='translate(4px, 4px)'"
     onmouseleave="this.style.boxShadow='4px 4px 0px #000'; this.style.transform='translate(0, 0)'">

    {{-- Foto --}}
    <div class="w-full overflow-hidden" style="aspect-ratio: 4/3;">
    @if($product->image)
        <img
            src="{{ asset('storage/' . $product->image) }}"
            alt="{{ $product->nama_produk }}"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
        >
    @else
        <img
            src="{{ asset('assets/images/products/default-product.png') }}"
            alt="{{ $product->nama_produk }}"
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
        >
    @endif
</div>

    {{-- Body --}}
    <div class="px-4 pt-4 pb-0 flex flex-col flex-grow">
        <span class="inline-block text-[10px] font-medium uppercase tracking-wide px-2 py-1 rounded mb-2 w-fit {{ $bgColor }} text-black">
            {{ $product->kategori ?? 'Produk' }}
        </span>
        <h3 class="text-base font-medium leading-snug mb-1" style="color: #f0ece4;">
            {{ $product->nama_produk }}
        </h3>
        <p class="text-[12px] leading-relaxed flex-grow" style="color: #9a948a;">
            {{ Str::limit($product->deskripsi, 90) }}
        </p>
    </div>

    {{-- Footer: stok --}}
    <div class="flex justify-between items-center px-4 py-3 mt-3" style="border-top: 0.5px solid rgba(255,255,255,0.08);">
        <span class="text-sm" style="color: #c8c2ba;">
            <span class="text-lg font-medium" style="color: #f0ece4;">{{ $stok }}</span>
            pcs tersisa
        </span>
        <span class="text-[11px] font-medium px-3 py-1 rounded-full {{ $statusClass }}">
            {{ $statusLabel }}
        </span>
    </div>

</div>