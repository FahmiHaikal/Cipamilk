<header class="bg-white sticky top-0 z-50 shadow-sm border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            
            <div class="flex-shrink-0 flex items-center gap-3 cursor-pointer" onclick="window.location.href='{{ url('/') }}'">
                <div class="w-9 h-9 bg-blue-600 text-white rounded-xl flex items-center justify-center font-bold text-lg shadow-inner">
                    S
                </div>
                <div>
                    <h1 class="font-bold text-xl text-gray-900 leading-none">Cipamilk</h1>
                    <p class="text-[10px] font-semibold text-gray-500 uppercase tracking-wider mt-0.5">Susu Sentra Cipageran</p>
                </div>
            </div>

            <nav class="hidden md:flex space-x-8">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-600 font-medium text-sm transition-colors border-b-2 border-transparent hover:border-blue-600 pb-1">
                    Beranda
                </a>
                <a href="{{ url('/#katalog') }}" class="text-gray-600 hover:text-blue-600 font-medium text-sm transition-colors border-b-2 border-transparent hover:border-blue-600 pb-1">
                    Katalog Produk
                </a>
                <a href="{{ url('/#tentang-kkn') }}" class="text-gray-600 hover:text-blue-600 font-medium text-sm transition-colors border-b-2 border-transparent hover:border-blue-600 pb-1">
                    Tentang Program
                </a>
            </nav>

            <div class="hidden md:flex items-center gap-4">
                <a href="#" class="inline-flex items-center justify-center px-5 py-2 text-sm font-medium text-white transition-all bg-blue-600 border border-transparent rounded-full hover:bg-blue-700 hover:shadow-md">
                    Hubungi Produsen
                </a>
            </div>

            <div class="flex items-center md:hidden">
                <button type="button" class="text-gray-500 hover:text-gray-900 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

        </div>
    </div>
</header>