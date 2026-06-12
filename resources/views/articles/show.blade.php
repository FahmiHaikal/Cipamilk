@extends('layouts.app')

@section('title', $article->title . ' - Super Susu Cipageran')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 md:mt-10 mb-20">
    
    <nav class="flex text-sm text-gray-500 font-medium mb-8">
        <a href="{{ url('/') }}" class="hover:text-green-600 transition-colors">Beranda</a>
        <span class="mx-2">/</span>
        <a href="{{ route('article.index') }}" class="hover:text-green-600 transition-colors">Jurnal UMKM</a>
        <span class="mx-2">/</span>
        <span class="text-gray-900 truncate max-w-xs">{{ $article->title }}</span>
    </nav>

    <!-- Konten Artikel -->
    <article class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
        <!-- Gambar Utama -->
        <div class="w-full h-64 md:h-96 bg-gray-100 relative">
            <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://placehold.co/1200x600/e2e8f0/475569?text=Dokumentasi+Kegiatan' }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
        </div>

        <div class="p-8 md:p-12">
            <!-- Meta Data -->
            <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-100">
                <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined">storefront</span>
                </div>
                <div>
                    <!-- Menampilkan Nama UMKM Penulis -->
                    <p class="text-sm font-bold text-gray-900">{{ $article->umkm->nama_umkm ?? 'UMKM Sentra Cipageran' }}</p>
                    <p class="text-xs text-gray-500 flex items-center gap-1">
                        <span class="material-symbols-outlined text-[10px]">calendar_today</span>
                        {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d F Y') : 'Baru Saja' }}
                    </p>
                </div>
            </div>

            <!-- Judul & Isi Artikel -->
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight mb-8">
                {{ $article->title }}
            </h1>
            
            <div class="prose prose-green prose-lg max-w-none text-gray-700">
                {!! nl2br(e($article->content)) !!}
            </div>
        </div>
    </article>

    <!-- Rekomendasi Bacaan -->
    @if($recentArticles->isNotEmpty())
        <div class="mt-16 pt-8 border-t border-gray-200">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Baca Jurnal Lainnya</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($recentArticles as $recent)
                    <a href="{{ route('article.detail', $recent) }}" class="group block">
                        <div class="aspect-video bg-gray-100 rounded-xl overflow-hidden mb-3">
                            <img src="{{ $recent->image ? asset('storage/' . $recent->image) : 'https://placehold.co/600x400/e2e8f0/475569?text=Berita' }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <h4 class="text-base font-bold text-gray-900 group-hover:text-green-600 transition-colors line-clamp-2">{{ $recent->title }}</h4>
                        <p class="text-xs text-gray-500 mt-1">{{ $recent->published_at ? \Carbon\Carbon::parse($recent->published_at)->format('d M Y') : '' }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

</div>
@endsection