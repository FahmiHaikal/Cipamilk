@extends('layouts.app')

@section('title', 'Jurnal & Prestasi - Super Susu Cipageran')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 md:mt-10 mb-20 space-y-8">
    
    <nav class="flex text-sm text-gray-500 font-medium mb-6">
        <a href="{{ url('/') }}" class="hover:text-green-600 transition-colors">Beranda</a>
        <span class="mx-2">/</span>
        <span class="text-gray-900">Jurnal UMKM</span>
    </nav>

    <!-- Header Jurnal -->
    <section class="bg-green-600 rounded-[2rem] p-10 md:p-16 text-center text-white relative overflow-hidden shadow-md">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="relative z-10">
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">Jurnal & Prestasi UMKM</h1>
            <p class="text-green-100 max-w-2xl mx-auto text-lg">Dokumentasi kegiatan, pencapaian, dan cerita di balik proses produksi peternak susu Sentra Cipageran.</p>
        </div>
    </section>

    <!-- Grid Artikel -->
    <section>
        @if($articles->isEmpty())
            <div class="bg-gray-50 rounded-2xl p-16 text-center border border-gray-100 mt-8">
                <span class="material-symbols-outlined text-6xl text-gray-300 mb-4 block">article</span>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Publikasi</h3>
                <p class="text-gray-500 text-sm">Mitra UMKM belum mengunggah jurnal atau berita terbaru.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
                @foreach($articles as $article)
                <article class="bg-white rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col group">
                    <div class="aspect-[4/3] bg-gray-200 relative overflow-hidden">
                        <!-- Perbaikan link gambar di sini -->
                        <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://placehold.co/600x400/e2e8f0/475569?text=Berita+Cipageran' }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-green-700 shadow-sm">
                            Cerita UMKM
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 flex items-center gap-1">
                            <span class="material-symbols-outlined text-xs">calendar_today</span>
                            {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d M Y') : 'Baru Saja' }}
                            
                            <span class="mx-1">•</span>
                            <span class="truncate">{{ $article->umkm->nama_umkm ?? 'Cipageran' }}</span>
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('article.detail', $article) }}" class="hover:text-green-600 transition-colors">{{ $article->title }}</a>
                        </h3>
                        <p class="text-sm text-gray-600 line-clamp-3 mb-6 leading-relaxed">
                            {{ Str::limit(strip_tags($article->content), 120) }}
                        </p>
                        <div class="flex-grow"></div>
                        <a href="{{ route('article.detail', $article) }}" class="text-green-600 font-semibold text-sm flex items-center gap-1 hover:text-green-700 w-fit">
                            Baca Jurnal <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $articles->links() }}
            </div>
        @endif
    </section>
</div>
@endsection