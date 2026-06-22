@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-green-50 rounded-[2rem] overflow-hidden flex flex-col-reverse lg:flex-row items-stretch shadow-sm border border-green-100 relative">
        
        <div class="w-full lg:w-1/2 p-10 lg:p-16 flex flex-col justify-center text-center lg:text-left z-10">
            <span class="text-green-600 font-bold tracking-widest uppercase text-xs mb-4">Sentra Peternakan Terpadu</span>
            <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-6 tracking-tight">
                Kesegaran Susu Cipageran,<br>Langsung ke Tangan Anda.
            </h1>
            <p class="text-lg text-gray-600 mb-8 max-w-lg mx-auto lg:mx-0 leading-relaxed">
                Pusat produksi olahan susu terbaik sejak 2014. Kami memberdayakan peternak lokal dengan standar kualitas dan kebersihan modern untuk menghasilkan susu murni bernutrisi tinggi.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                <a href="#katalog" class="bg-green-600 hover:bg-green-700 text-white font-medium py-3.5 px-8 rounded-full transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                    Lihat Katalog Produk
                    <span class="material-symbols-outlined text-sm">arrow_downward</span>
                </a>
                <a href="#tentang" class="bg-white border border-green-200 text-green-700 hover:bg-green-50 hover:border-green-300 font-medium py-3.5 px-8 rounded-full transition-all duration-300 flex items-center justify-center">
                    Kenali Sentra Kami
                </a>
            </div>
        </div>
        <div class="w-full lg:w-1/2 h-72 sm:h-96 lg:h-auto relative min-h-[400px] lg:min-h-[500px]">
            <div class="absolute inset-0 bg-gradient-to-t lg:bg-gradient-to-r from-green-50 to-transparent z-10 w-full h-full"></div>
            <img src="{{ asset('assets/abouts/Banner.jpeg') }}" alt="Peternakan Sapi Cipageran" class="absolute inset-0 w-full h-full object-cover">
        </div>

    </div>
</section>


<!-- Stats Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 relative z-20 -mt-8">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-gray-100">
            <div class="flex flex-col items-center justify-center">
                <span class="text-4xl font-extrabold text-green-600 mb-2">100+</span>
                <span class="text-sm font-medium text-gray-500">Sapi Perah Sehat</span>
            </div>
            <div class="flex flex-col items-center justify-center">
                <span class="text-4xl font-extrabold text-green-600 mb-2">5+</span>
                <span class="text-sm font-medium text-gray-500">UMKM Binaan Terpadu</span>
            </div>
            <div class="flex flex-col items-center justify-center">
                <span class="text-4xl font-extrabold text-green-600 mb-2">100%</span>
                <span class="text-sm font-medium text-gray-500">Pasteurisasi Alami</span>
            </div>
            <div class="flex flex-col items-center justify-center">
                <span class="material-symbols-outlined text-4xl text-green-600 mb-2">verified</span>
                <span class="text-sm font-medium text-gray-500">Standar Halal & Higienis</span>
            </div>
        </div>
    </div>
</section>

<!-- Tentang Section -->
<section id="tentang" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-12 items-center mb-20">
            <!-- PENGGANTIAN: Bagian Gambar Menjadi Slider -->
            <div class="w-full lg:w-1/2">
                <div class="swiper tentangSwiper rounded-[2rem] shadow-md overflow-hidden">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('assets/abouts/tentang1.jpg') }}" class="w-full h-auto aspect-square object-cover"></div>
                        <div class="swiper-slide"><img src="{{ asset('assets/abouts/tentang2.jpg') }}" class="w-full h-auto aspect-square object-cover"></div>
                        <div class="swiper-slide"><img src="{{ asset('assets/abouts/tentang3.jpg') }}" class="w-full h-auto aspect-square object-cover"></div>
                    </div>
                    <!-- Navigasi Slider -->
                    <div class="swiper-button-next !text-white"></div>
                    <div class="swiper-button-prev !text-white"></div>
                </div>
            </div>

        <div class="w-full lg:w-1/2">
            <h2 class="text-green-600 font-bold tracking-widest uppercase text-sm mb-3">Kisah & Budaya Kami</h2>
            <h3 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 tracking-tight">Dedikasi dari Peternak,<br>Kearifan Lokal untuk Keluarga.</h3>
            
            <p class="text-gray-600 leading-relaxed mb-4">
                Berawal dari inisiatif para peternak di kawasan Cipageran, kami berkomitmen untuk tidak hanya menghasilkan susu sapi berkualitas tinggi, tetapi juga memberdayakan ekonomi warga sekitar melalui pembentukan kelompok UMKM pengolahan susu.
            </p>
            <p class="text-gray-600 leading-relaxed mb-4">
                Lebih dari sekadar sentra peternakan, Cipageran mewariskan harmoni alam dan budaya agraris yang kental. Tumbuh di sejuknya wilayah utara Kota Cimahi, langkah kami selalu dijiwai oleh filosofi <span class="italic font-medium">sabilulungan</span>—kearifan lokal masyarakat Sunda tentang gotong royong dan rasa saling peduli. Semangat kebersamaan inilah yang menyatukan peternak dan perajin lokal untuk saling menopang dan berinovasi.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Perpaduan antara tradisi yang dijaga turun-temurun dan kontrol kualitas modern memastikan setiap tetes produk Super Susu Cipageran membawa nutrisi serta kebaikan alam, dari peternakan kami hingga tiba di meja makan keluarga Anda.
            </p>
        </div>
        </div>
        <!-- (Grid Visi Misi tetap sama di bawah sini) -->
    </div>
</section>  
<!-- Katalog / Hot Items Section -->
<section id="katalog" class="max-w-7xl mx-auto px-4 py-16">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Katalog Produk UMKM</h2>
            <p class="text-gray-500 mt-2 text-sm">Temukan olahan susu terbaik dari mitra kami.</p>
        </div>
        <a href="{{ route('product.index') }}" class="hidden md:flex items-center text-green-600 hover:text-green-700 font-semibold text-sm gap-1">
            Lihat Semua <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </a>
    </div>

    <!-- Swiper Container -->
    <div class="swiper hotItemsSwiper relative pb-10">
        <div class="swiper-wrapper">
            @foreach($hotItems as $item)
            <div class="swiper-slide h-auto">
                <article class="bg-white rounded-2xl overflow-hidden flex flex-col h-full border border-gray-100 shadow-sm hover:shadow-lg transition-shadow duration-300 group relative">
                    <div class="bg-gray-50 p-4 h-56 flex items-center justify-center relative overflow-hidden">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->nama_produk }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                    </div>
                    @if(isset($item->diskon) && $item->diskon > 0)
                        <div class="absolute top-3 right-3 bg-red-500 text-white py-1 px-3 rounded-full text-xs font-bold shadow-sm">
                            -{{ $item->diskon }}%
                        </div>
                    @endif
                    <div class="p-5 flex flex-col flex-grow">
                        <h3 class="text-base font-bold text-gray-900 truncate mb-1">
                            <a href="{{ route('product.detail', $item) }}" class="hover:text-green-600 transition-colors">{{ $item->nama_produk }}</a>
                        </h3>
                        <p class="text-xs font-medium text-gray-500 mb-3">{{ $item->kategori }}</p>
                        <div class="flex-grow"></div> 
                        <div class="mt-4 pt-4 border-t border-gray-50 flex items-center justify-between">
                            <div class="flex flex-col">
                                @if(isset($item->diskon) && $item->diskon > 0)
                                    @php $hargaDiskon = $item->harga - ($item->harga * ($item->diskon / 100)); @endphp
                                    <span class="text-xs text-gray-400 line-through">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                                    <span class="text-lg font-bold text-green-600">Rp {{ number_format($hargaDiskon, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-lg font-bold text-gray-900">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                                @endif
                            </div>
                            <a href="{{ route('product.detail', $item) }}" class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center text-gray-600 hover:bg-green-600 hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-xl">shopping_cart</span>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
        <!-- Tombol Navigasi Swiper -->
        <div class="swiper-button-next !text-green-700 !bg-white !w-12 !h-12 !rounded-full shadow-lg after:!text-lg border border-gray-100 hover:!bg-green-50 transition-colors"></div>
        <div class="swiper-button-prev !text-green-700 !bg-white !w-12 !h-12 !rounded-full shadow-lg after:!text-lg border border-gray-100 hover:!bg-green-50 transition-colors"></div>
    </div>
</section>

<!-- Mitra UMKM Section -->
<section id="mitra-umkm" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Mitra UMKM Kami</h2>
            <p class="text-gray-500 mt-2">Pahlawan di balik lezatnya produk olahan susu Cipageran.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($umkms as $umkm)
            <a href="{{ route('umkm.detail', $umkm) }}" class="bg-white rounded-[2rem] p-8 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group text-center flex flex-col items-center">
                <div class="w-20 h-20 bg-green-50 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-4xl text-green-600">storefront</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $umkm->nama_umkm }}</h3>
                <p class="text-sm text-gray-500 mb-6 line-clamp-2">{{ $umkm->story ?? 'Menghadirkan olahan susu berkualitas khas Cipageran.' }}</p>
                <span class="mt-auto px-6 py-2 border border-green-200 text-green-600 rounded-full text-sm font-semibold group-hover:bg-green-600 group-hover:text-white transition-colors">
                    Kunjungi Toko
                </span>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Jurnal Section -->
<section id="jurnal" class="max-w-7xl mx-auto px-4 py-16">
    <div class="flex justify-between items-end mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Jurnal & Pencapaian</h2>
            <p class="text-gray-500 mt-2 text-sm">Kabar terbaru dari kegiatan KKN di Sentra Cipageran.</p>
        </div>
        <a href="{{ route('article.index') }}" class="hidden md:flex items-center text-green-600 hover:text-green-700 font-semibold text-sm gap-1">
            Lihat Semua <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </a>
    </div>
    
    @if($articles->isEmpty())
        <div class="bg-gray-50 rounded-2xl p-8 text-center border border-gray-100">
            <span class="material-symbols-outlined text-4xl text-gray-400 mb-2">article</span>
            <p class="text-gray-500">Belum ada jurnal atau berita yang diterbitkan.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($articles as $article)
            <article class="bg-white rounded-2xl overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow flex flex-col">
                <div class="aspect-video bg-gray-200 relative">
                    <!-- PERBAIKAN: asset('storage/' . $article->image) -->
                    <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://placehold.co/600x400/e2e8f0/475569?text=Berita+Cipageran' }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <span class="text-xs font-semibold text-green-600 uppercase tracking-wider mb-2 block">
                        {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d M Y') : 'Terbaru' }}
                    </span>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 line-clamp-2">
                        <a href="{{ url('/jurnal/' . $article->slug) }}" class="hover:text-green-600 transition-colors">{{ $article->title }}</a>
                    </h3>
                    <p class="text-sm text-gray-600 line-clamp-3 mb-4">
                        {{ Str::limit(strip_tags($article->content), 100) }}
                    </p>
                    <div class="flex-grow"></div>
                    <a href="{{ url('/jurnal/' . $article->slug) }}" class="text-green-600 font-semibold text-sm flex items-center gap-1 hover:text-green-700 w-fit">
                        Baca selengkapnya <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    @endif
</section>

<!-- Lokasi Section -->
<section id="lokasi" class="max-w-7xl mx-auto px-4 py-16 mb-12">
    <div class="bg-gray-900 rounded-[2.5rem] overflow-hidden flex flex-col md:flex-row shadow-2xl relative">
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-green-500 rounded-full opacity-20 blur-3xl"></div>
        
        <div class="w-full md:w-1/2 p-12 lg:p-16 flex flex-col justify-center relative z-10">
            <h2 class="text-green-400 font-bold tracking-widest uppercase text-sm mb-3">Pusat Produksi</h2>
            <h3 class="text-3xl lg:text-4xl font-bold text-white mb-6">Kunjungi Sentra Kami</h3>
            <p class="text-gray-300 leading-relaxed mb-8">
                Ingin melihat langsung proses pasteurisasi susu murni atau berdiskusi mengenai kerjasama investasi? Kunjungi sentra UMKM kami di Cipageran. Kami dengan senang hati menyambut Anda.
            </p>
            <div class="flex items-center gap-4 mb-8 text-gray-300">
                <span class="material-symbols-outlined text-green-400">location_on</span>
                <span>Jl. Sentra Susu Cipageran No. 123, Kota Cimahi, Jawa Barat</span>
            </div>
            <a href="https://maps.google.com" target="_blank" class="bg-green-500 hover:bg-green-600 text-white font-medium py-3.5 px-8 rounded-full transition-colors w-fit flex items-center gap-2">
                Buka di Google Maps
                <span class="material-symbols-outlined text-sm">open_in_new</span>
            </a>
        </div>
        
        <!-- Wadah Peta (Pastikan ada z-index dan min-height) -->
        <div id="map" class="w-full md:w-1/2 min-h-[350px] relative z-10" style="min-height: 400px;"></div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-white border-t border-gray-200 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center md:items-start text-center md:text-left">
            
            <!-- Identitas Brand & Deskripsi Singkat -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Super Susu Cipageran</h2>
                <p class="mt-3 text-sm text-gray-500 leading-relaxed max-w-xs mx-auto md:mx-0">
                    Platform etalase digital untuk mendukung pemasaran produk olahan susu. Sebuah dedikasi nyata untuk pemberdayaan UMKM lokal.
                </p>
            </div>

            <!-- Tautan Navigasi -->
            <div class="flex flex-col items-center md:items-start">
                <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">Informasi Terkait</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ url('/#tentang') }}" class="text-sm text-gray-600 hover:text-green-600 transition-colors">Program KKN Tematik</a>
                    </li>
                    <li>
                        <a href="https://telkomuniversity.ac.id" target="_blank" class="text-sm text-gray-600 hover:text-green-600 transition-colors">Telkom University</a>
                    </li>
                    <li>
                        <a href="{{ route('product.index') }}" class="text-sm text-gray-600 hover:text-green-600 transition-colors">Sentra UMKM Cipageran</a>
                    </li>
                </ul>
            </div>

            <!-- Dukungan & Afiliasi -->
            <div class="flex flex-col items-center md:items-start">
                <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">Didukung Oleh</h3>
                <div class="flex flex-wrap justify-center md:justify-start gap-3">
                    <span class="px-3 py-1.5 bg-gray-50 border border-gray-200 rounded-md text-xs font-medium text-gray-600">
                        Mahasiswa KKN
                    </span>
                    <span class="px-3 py-1.5 bg-gray-50 border border-gray-200 rounded-md text-xs font-medium text-gray-600">
                        UMKM Cimahi
                    </span>
                </div>
            </div>

        </div>

        <!-- Garis Bawah & Hak Cipta -->
        <div class="mt-12 pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-sm text-gray-500">
                © 2026 CipaMilk. Kolaborasi KKN & UMKM Cimahi.
            </p>
            <div class="text-sm text-gray-400">
                Pengembangan Inovasi Berkelanjutan
            </div>
        </div>
    </div>
</footer>

<!-- PERBAIKAN: Tambahkan script Swiper agar fitur geser katalog berfungsi -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Script Eksekusi -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper(".hotItemsSwiper", {
            slidesPerView: 1.5, 
            spaceBetween: 16,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: { slidesPerView: 2.5, spaceBetween: 20 }, 
                1024: { slidesPerView: 4, spaceBetween: 24 }, 
            },
        });

        var map = L.map('map').setView([-6.840944, 107.546667], 16);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([-6.840944, 107.546667]).addTo(map)
            .bindPopup('Sentra Susu Cipageran')
            .openPopup();

        var urlBatasKota = "https://nominatim.openstreetmap.org/search?q=Kota+Cimahi,Jawa+Barat&format=json&polygon_geojson=1&limit=1";
        
        fetch(urlBatasKota)
            .then(response => response.json())
            .then(data => {
                if (data && data.length > 0) {
                    var batasCimahi = data[0].geojson;
                    
                    L.geoJSON(batasCimahi, {
                        style: {
                            color: "#16a34a",  
                            weight: 3,           
                            opacity: 0.9,        
                            fillColor: "#16a34a", 
                            fillOpacity: 0.05     
                        }
                    }).addTo(map);
                }
            })
            .catch(error => console.error("Gagal memuat batas kota:", error));

            
    });

    var tentangSwiper = new Swiper(".tentangSwiper", {
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    });
</script>

@endsection