<nav x-data="{ open: false }" class="bg-white sticky top-0 z-50 shadow-sm border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            
            <!-- Logo Brand -->
            <div class="flex-shrink-0 flex items-center gap-3 cursor-pointer" onclick="window.location.href='{{ url('/') }}'">
                
                <!-- Gambar Logo (Path disesuaikan dengan qqq.png) -->
                <img src="{{ asset('assets/images/cipamilk_logo.png') }}" alt="Logo CipaMilk" class="w-12 h-12 object-contain drop-shadow-sm">
                
                <!-- Teks Brand (Dikembalikan agar mendampingi logo) -->
                <div>
                    <h1 class="font-bold text-xl text-gray-900 leading-none">Cipamilk</h1>
                    <p class="text-[10px] font-semibold text-gray-500 uppercase tracking-wider mt-0.5">Susu Sentra Cipageran</p>
                </div>
                
            </div>

            <div class="hidden md:flex space-x-8">
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
                    Berita
                </a>
            </div>

            <div class="hidden md:flex items-center gap-4">
                
                @guest
                    <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-green-600 transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-2 text-sm font-bold text-white transition-all bg-green-600 border border-transparent rounded-full hover:bg-green-700 hover:shadow-md">
                        Daftar
                    </a>
                @endguest

                @auth
                    @php
                        $userRole = Auth::user()->role;
                        if ($userRole === 'admin') {
                            $dashboardLink = route('admin.dashboard');
                        } elseif ($userRole === 'umkm') {
                            $dashboardLink = route('umkm.dashboard');
                        } else {
                            $dashboardLink = route('profile.edit'); 
                        }
                    @endphp

                    <a href="{{ $dashboardLink }}" class="flex items-center gap-2 text-sm font-bold text-gray-700 hover:text-green-600 transition-colors bg-gray-50 px-4 py-1.5 rounded-full border border-gray-200">
                        <span class="material-symbols-outlined text-lg">account_circle</span>
                        <span class="truncate max-w-[100px]">{{ Auth::user()->name }}</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-red-500 hover:text-red-700 transition-colors px-2 py-1">
                            Keluar
                        </button>
                    </form>
                @endauth

            </div>

            <div class="flex items-center md:hidden">
                <button @click="open = ! open" type="button" class="text-gray-500 hover:text-gray-900 focus:outline-none p-2 bg-gray-50 rounded-lg">
                    <span class="material-symbols-outlined" x-text="open ? 'close' : 'menu'">menu</span>
                </button>
            </div>

        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden border-t border-gray-100 bg-white">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ url('/') }}" class="block py-2 text-base font-medium text-gray-600 hover:text-green-600">Beranda</a>
            <a href="{{ route('product.index') }}" class="block py-2 text-base font-medium text-gray-600 hover:text-green-600">Katalog Produk</a>
            <a href="{{ url('/#tentang') }}" class="block py-2 text-base font-medium text-gray-600 hover:text-green-600">Tentang Sentra</a>
            <a href="{{ url('/#jurnal') }}" class="block py-2 text-base font-medium text-gray-600 hover:text-green-600">Jurnal KKN</a>
        </div>

        <div class="pt-4 pb-4 border-t border-gray-100 px-4">
            @guest
                <a href="{{ route('login') }}" class="block py-2 text-base font-bold text-gray-600">Masuk Akun</a>
                <a href="{{ route('register') }}" class="block py-2 text-base font-bold text-green-600">Daftar Akun Baru</a>
            @endguest

            <!-- JIKA SUDAH LOGIN (AUTH) -->
                @auth
                    @php
                        $userRole = Auth::user()->role;
                        if ($userRole === 'admin') {
                            $dashboardLink = route('admin.dashboard');
                        } elseif ($userRole === 'umkm') {
                            $dashboardLink = route('umkm.dashboard');
                        } else {
                            $dashboardLink = route('profile.edit'); 
                        }
                    @endphp

                    <div class="flex items-center gap-3">
                        <!-- Info User (Foto, Nama, Email) & Link Dashboard -->
                        <a href="{{ $dashboardLink }}" class="flex items-center gap-3 bg-gray-50 hover:bg-green-50 pl-2 pr-4 py-1.5 rounded-full border border-gray-200 hover:border-green-300 transition-all group">
                            
                            <!-- Foto Profil Default Sementara (Inisial Nama) -->
                            <div class="w-9 h-9 rounded-full overflow-hidden border-2 border-white shadow-sm flex-shrink-0 group-hover:border-green-400 transition-colors">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=16a34a&color=fff&bold=true" alt="Avatar" class="w-full h-full object-cover">
                            </div>
                            
                            <!-- Nama & Email -->
                            <div class="flex flex-col text-left hidden lg:flex">
                                <span class="text-sm font-bold text-gray-800 leading-tight truncate max-w-[120px] group-hover:text-green-700 transition-colors">{{ Auth::user()->name }}</span>
                                <span class="text-[10px] text-gray-500 font-medium truncate max-w-[120px]">{{ Auth::user()->email }}</span>
                            </div>
                        </a>

                        <!-- Tombol Logout -->
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="w-10 h-10 flex items-center justify-center bg-red-50 text-red-500 hover:bg-red-600 hover:text-white rounded-full transition-colors border border-red-100 shadow-sm" title="Keluar">
                                <span class="material-symbols-outlined text-lg">logout</span>
                            </button>
                        </form>
                    </div>
                @endauth
            
        </div>
    </div>
</nav>