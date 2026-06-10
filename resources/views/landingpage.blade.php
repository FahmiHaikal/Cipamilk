@extends('layouts.app')

@section('content')

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-green-50 rounded-[2rem] overflow-hidden flex flex-col-reverse lg:flex-row items-center shadow-sm border border-green-100 relative">
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
        <div class="w-full lg:w-1/2 h-72 sm:h-96 lg:h-full relative min-h-[400px] lg:min-h-[500px]">
            <div class="absolute inset-0 bg-gradient-to-t lg:bg-gradient-to-r from-green-50 to-transparent z-10 w-full h-full"></div>
            <img src="https://placehold.co/800x600/e2e8f0/475569?text=Foto+Peternakan+Sapi+Cipageran" alt="Peternakan Sapi Cipageran" class="absolute inset-0 w-full h-full object-cover">
        </div>
    </div>
</section>

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

<section id="tentang" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-12 items-center mb-20">
            <div class="w-full lg:w-1/2">
                <img src="https://placehold.co/600x600/e2e8f0/475569?text=Foto+Proses+Produksi/Peternak" alt="Kisah Cipageran" class="rounded-[2rem] w-full h-auto object-cover shadow-md">
            </div>
            <div class="w-full lg:w-1/2">
                <h2 class="text-green-600 font-bold tracking-widest uppercase text-sm mb-3">Kisah Kami</h2>
                <h3 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 tracking-tight">Dedikasi dari Peternak,<br>Untuk Keluarga Anda.</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Berawal dari inisiatif para peternak lokal di kawasan Cipageran, kami berkomitmen untuk tidak hanya menghasilkan susu sapi berkualitas tinggi, tetapi juga memberdayakan ekonomi warga sekitar melalui pembentukan kelompok UMKM pengolahan susu.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Setiap tetes produk Super Susu Cipageran telah melewati proses kontrol kualitas yang ketat, memastikan nutrisi terbaik tetap terjaga dari peternakan hingga tiba di meja makan keluarga Anda.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gray-50 p-10 rounded-[2rem] border border-gray-100 hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-3xl">visibility</span>
                </div>
                <h4 class="text-2xl font-bold text-gray-900 mb-4">Visi Kami</h4>
                <p class="text-gray-600 leading-relaxed">
                    Menjadi pusat peternakan sapi perah dan sentra pengolahan susu terpadu nomor satu di Jawa Barat yang mengedepankan kualitas, kesejahteraan peternak, dan inovasi produk berkelanjutan.
                </p>
            </div>
            <div class="bg-gray-50 p-10 rounded-[2rem] border border-gray-100 hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-3xl">flag</span>
                </div>
                <h4 class="text-2xl font-bold text-gray-900 mb-4">Misi Kami</h4>
                <ul class="text-gray-600 leading-relaxed space-y-3">
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-green-500 text-xl shrink-0">check_circle</span> Menjamin standar kesehatan sapi dan higienitas proses pemerahan.</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-green-500 text-xl shrink-0">check_circle</span> Memberikan pendampingan bisnis dan produksi kepada UMKM mitra.</li>
                    <li class="flex items-start gap-3"><span class="material-symbols-outlined text-green-500 text-xl shrink-0">check_circle</span> Menghadirkan variasi olahan susu yang sehat, halal, dan lezat untuk konsumen.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="katalog" class="max-w-7xl mx-auto px-4 py-16">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Katalog Produk UMKM</h2>
            <p class="text-gray-500 mt-2 text-sm">Temukan olahan susu terbaik dari mitra kami.</p>
        </div>
        <a href="{{ route('landing') }}" class="hidden md:flex items-center text-green-600 hover:text-green-700 font-semibold text-sm gap-1">
            Lihat Semua <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </a>
    </div>

    <div class="swiper hotItemsSwiper relative pb-10">
        <div class="swiper-wrapper">
            @foreach($hotItems as $item)
            <div class="swiper-slide h-auto">
                <article class="bg-white rounded-2xl overflow-hidden flex flex-col h-full border border-gray-100 shadow-sm hover:shadow-lg transition-shadow duration-300 group relative">
                    <div class="bg-gray-50 p-4 h-56 flex items-center justify-center relative overflow-hidden">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->nama_produk }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                    </div>
                    @if(isset($item->discount_price) && $item->discount_price > 0)
                        <div class="absolute top-3 right-3 bg-red-500 text-white py-1 px-3 rounded-full text-xs font-bold shadow-sm">
                            -{{ $item->discount_percentage }}%
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
                                @if(isset($item->discount_price) && $item->discount_price > 0)
                                    @php $hargaDiskon = $item->harga - ($item->harga * ($item->discount_percentage / 100)); @endphp
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
        <div class="swiper-button-next !text-green-700 !bg-white !w-12 !h-12 !rounded-full shadow-lg after:!text-lg border border-gray-100 hover:!bg-green-50 transition-colors"></div>
        <div class="swiper-button-prev !text-green-700 !bg-white !w-12 !h-12 !rounded-full shadow-lg after:!text-lg border border-gray-100 hover:!bg-green-50 transition-colors"></div>
    </div>
</section>

<section id="mitra-umkm" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Mitra UMKM Kami</h2>
            <p class="text-gray-500 mt-2">Pahlawan di balik lezatnya produk olahan susu Cipageran.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($umkms as $umkm)
            <a href="#" class="bg-white rounded-[2rem] p-8 border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group text-center flex flex-col items-center">
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

<section id="jurnal" class="max-w-7xl mx-auto px-4 py-16">
    <div class="flex justify-between items-end mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Jurnal & Pencapaian</h2>
            <p class="text-gray-500 mt-2 text-sm">Kabar terbaru dari kegiatan KKN di Sentra Cipageran.</p>
        </div>
        <a href="#" class="hidden md:flex items-center text-green-600 hover:text-green-700 font-semibold text-sm gap-1">
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
                    <img src="{{ $article->image ? asset($article->image) : 'https://placehold.co/600x400/e2e8f0/475569?text=Berita+Cipageran' }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
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
        
        <div class="w-full md:w-1/2 min-h-[350px] relative bg-gray-200">
            <img src="https://placehold.co/800x600/cbd5e1/475569?text=Gambar+Peta/Lokasi+Cipageran" alt="Peta Lokasi" class="absolute inset-0 w-full h-full object-cover">
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
    });
</script>

@endsection