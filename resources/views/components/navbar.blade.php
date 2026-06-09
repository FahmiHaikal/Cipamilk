<header class="bg-[#1a1710] border-b border-white/10 sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-3 flex items-center gap-4">

        {{-- Logo --}}
        <a href="{{ url('/') }}"
           class="text-white text-2xl md:text-4xl whitespace-nowrap"
           style="font-family:'Cormorant Garamond', serif;">
            CIPA<span class="text-[#c08a4d]">M</span>ILK
        </a>

        {{-- Search --}}
        <div class="flex-1 flex justify-center">

            <form class="w-full max-w-2xl">
                <div class="relative">

                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                        search
                    </span>

                    <input
                        type="text"
                        placeholder="Cari produk..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-lg bg-white/10 border border-white/10 text-white placeholder:text-gray-400 focus:outline-none focus:border-[#c08a4d]"
                    >

                </div>
            </form>

        </div>

        {{-- Dashboard / Login --}}
        @auth

    @if(Auth::user()->role === 'super_admin')
        <a href="{{ route('admin.products.pending') }}"
           class="text-white hover:text-[#c08a4d] whitespace-nowrap transition">
            Dashboard
        </a>
    @else
        <a href="{{ route('dashboard') }}"
           class="text-white hover:text-[#c08a4d] whitespace-nowrap transition">
            Dashboard
        </a>
    @endif

    @else
        <a href="{{ route('login') }}"
        class="text-white hover:text-[#c08a4d] whitespace-nowrap transition">
            Masuk
        </a>
    @endauth

    </div>

</header>