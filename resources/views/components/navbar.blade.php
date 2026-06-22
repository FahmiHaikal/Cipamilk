<header class="bg-white sticky top-0 z-50 shadow-sm border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            
            <!-- Logo Brand -->
            <div class="flex-shrink-0 flex items-center gap-3 cursor-pointer" onclick="window.location.href='{{ url('/') }}'">
                <!-- Gambar Logo -->
                <img src="{{ asset('images/cipamilk_logo.png') }}" alt="Logo CipaMilk" class="w-12 h-12 object-contain drop-shadow-sm">
                
                <!-- Teks Brand -->
                <div>
                    <h1 class="font-bold text-xl text-gray-900 leading-none">Cipamilk</h1>
                    <p class="text-[10px] font-semibold text-gray-500 uppercase tracking-wider mt-0.5">Susu Sentra Cipageran</p>
                </div>
            </div>

            <!-- Navigasi Desktop -->
            <nav class="hidden md:flex space-x-8">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-green-600 font-medium text-sm transition-colors border-b-2 border-transparent hover:border-green-600 pb-1">
                    Beranda
                </a>
                <a href="{{ route('product.index') }}" class="text-gray-600 hover:text-green-600 font-medium text-sm transition-colors border-b-2 border-transparent hover:border-green-600 pb-1">
                    Katalog Produk
                </a>
                <a href="{{ url('/#tentang') }}" class="text-gray-600 hover:text-green-600 font-medium text-sm transition-colors border-b-2 border-transparent hover:border-green-600 pb-1">
                    Tentang Sentra
                </a>
                <a href="{{ url('/#jurnal') }}" class="text-gray-600 hover:text-green-600 font-medium text-sm transition-colors border-b-2 border-transparent hover:border-green-600 pb-1">
                    Jurnal KKN
                </a>
            </nav>

            <!-- Autentikasi / Call to Action -->
            <div class="hidden md:flex items-center gap-4">
                
                <!-- JIKA BELUM LOGIN (GUEST) -->
                @guest
                    <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-green-600 transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-2 text-sm font-bold text-white transition-all bg-green-600 border border-transparent rounded-full hover:bg-green-700 hover:shadow-md">
                        Daftar
                    </a>
                @endguest

                <!-- JIKA SUDAH LOGIN (AUTH) -->
                @auth
                    <!-- Penentuan arah link berdasarkan Role -->
                    @php
                        $userRole = Auth::user()->role;
                        if ($userRole === 'admin') {
                            $dashboardLink = route('admin.dashboard');
                        } elseif ($userRole === 'umkm') {
                            $dashboardLink = route('umkm.dashboard');
                        } else {
                            $dashboardLink = route('profile.edit'); // Konsumen diarahkan ke profil
                        }
                    @endphp

                    <!-- Info User & Link Dashboard -->
                    <a href="{{ $dashboardLink }}" class="flex items-center gap-2 text-sm font-bold text-gray-700 hover:text-green-600 transition-colors bg-gray-50 px-4 py-1.5 rounded-full border border-gray-200">
                        <span class="material-symbols-outlined text-lg">account_circle</span>
                        <span class="truncate max-w-[100px]">{{ Auth::user()->name }}</span>
                    </a>

                    <!-- Tombol Logout -->
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-red-500 hover:text-red-700 transition-colors px-2 py-1">
                            Keluar
                        </button>
                    </form>
                @endauth

            </div>

            <!-- Tombol Menu Mobile (Hamburger) -->
            <div class="flex items-center md:hidden">
                <button type="button" class="text-gray-500 hover:text-gray-900 focus:outline-none">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>

        </div>
    </div>
</header>