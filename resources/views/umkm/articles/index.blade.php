@extends('layouts.umkm')
@section('title', 'Jurnal UMKM')

@section('content')
<div class="umkm-page-header umkm-fade">
    <h1>Jurnal & Prestasi</h1>
    <p>Bagikan cerita, pencapaian, atau berita terbaru toko Anda</p>
</div>

<div class="mb-4">
    <a href="{{ route('umkm.articles.create') }}" class="umkm-btn umkm-btn--primary">➕ Tulis Artikel Baru</a>
</div>

{{-- Pernyataan / Notifikasi bahwa artikel sukses diterbitkan --}}
@if(session('success'))
    <div style="background-color: #dcfce7; border: 1px solid #bbf7d0; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500; font-size: 14px;">
        ✓ {{ session('success') }}
    </div>
@endif

<div class="umkm-card umkm-fade">
    <div class="umkm-card__head">📝 Daftar Artikel Anda</div>
    
    <table class="umkm-table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Judul Artikel</th>
                <th>Tanggal Rilis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>
                    <img src="{{ $article->image ? asset('storage/'.$article->image) : 'https://placehold.co/100x100' }}" alt="Foto" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                </td>
                <td><strong>{{ $article->title }}</strong></td>
                <td>{{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}</td>
                <td>
                    <form method="POST" action="{{ route('umkm.articles.destroy', $article->slug) }}">
                        @csrf
                        @method('DELETE')
                        <button class="umkm-btn umkm-btn--danger umkm-btn--icon" title="Hapus">🗑</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection