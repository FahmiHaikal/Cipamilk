<header class="sticky top-0 z-50 max-w-7xl mx-auto w-full px-margin-mobile md:px-gutter pt-4 md:pt-6">
    <nav class="relative bg-surface-white brutal-container px-4 py-3 md:px-8 md:py-4" aria-label="Navigasi utama">
        <div class="flex items-center justify-between gap-4">
            <a href="{{ url('/') }}" class="flex items-center" aria-label="CipaMilk beranda">
                <img src="{{ asset('assets/images/cipamilk_logo.png') }}" alt="CipaMilk Logo" class="h-10 md:h-12 scale-125 origin-left object-contain">
            </a>

            <div class="hidden md:flex items-center gap-8 text-label-bold font-label-bold uppercase absolute left-1/2 -translate-x-1/2">
                <a class="text-primary border-b-[3px] border-border-primary pb-1" href="{{ url('/') }}">Beranda</a>
                <a class="text-gray-800 hover:text-primary transition-colors" href="{{ url('/#katalog') }}">Katalog</a>
                <a class="text-gray-800 hover:text-primary transition-colors" href="{{ url('/#lokasi') }}">Lokasi Kami</a>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ url('/#katalog') }}" class="hidden md:flex brutal-container !rounded-lg bg-accent-yellow px-6 py-2 brutal-hover text-label-bold font-label-bold uppercase">
                    Lihat Produk
                </a>

                <button
                    type="button"
                    class="md:hidden inline-flex h-11 w-11 items-center justify-center rounded-xl border-[3px] border-border-primary bg-accent-yellow shadow-[4px_4px_0px_0px_#000000] transition-all duration-200 active:translate-x-1 active:translate-y-1 active:shadow-none"
                    aria-controls="mobile-menu"
                    aria-expanded="false"
                    data-mobile-menu-toggle
                >
                    <span class="sr-only">Buka menu navigasi</span>
                    <span class="material-symbols-outlined text-2xl" data-mobile-menu-icon>menu</span>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden absolute left-0 right-0 top-full mt-3 rounded-2xl border-[3px] border-border-primary bg-surface-white p-3 shadow-[6px_6px_0px_0px_#000000]" data-mobile-menu>
            <div class="grid gap-2 text-label-bold font-label-bold uppercase">
                <a class="rounded-xl border-[3px] border-border-primary bg-accent-green px-4 py-3 text-black" href="{{ url('/') }}" data-mobile-menu-link>Beranda</a>
                <a class="rounded-xl border-[3px] border-border-primary bg-accent-yellow px-4 py-3 text-black" href="{{ url('/#katalog') }}" data-mobile-menu-link>Katalog</a>
                <a class="rounded-xl border-[3px] border-border-primary bg-accent-pink px-4 py-3 text-black" href="{{ url('/#lokasi') }}" data-mobile-menu-link>Lokasi Kami</a>
            </div>
        </div>
    </nav>
</header>
