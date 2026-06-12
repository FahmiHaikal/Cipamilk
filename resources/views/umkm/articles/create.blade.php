@extends('layouts.umkm')
@section('title', 'Tulis Artikel - UMKM')

@section('content')
<div class="umkm-card--narrow">
    <div class="umkm-page-header">
        <h1>Tulis Artikel Baru</h1>
    </div>

    <div class="umkm-card">
        <form action="{{ route('umkm.articles.store') }}" method="POST" enctype="multipart/form-data" class="umkm-card__body">
            @csrf

            {{-- Menampilkan pesan error jika gambar terlalu besar atau data tidak valid --}}
            @if ($errors->any())
                <div style="background-color: #fee2e2; color: #991b1b; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                    <strong>Ups, ada yang salah:</strong>
                    <ul style="margin-top: 8px; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="umkm-form-group">
                <label class="umkm-label">Judul Artikel *</label>
                <input type="text" name="title" class="umkm-input" value="{{ old('title') }}" required placeholder="Contoh: UMKM Kami Meraih Penghargaan Terbaik">
            </div>

            <div class="umkm-form-group">
                <label class="umkm-label">Foto Utama</label>
                <input type="file" name="image" class="umkm-input" accept="image/*">
                {{-- Keterangan ukuran dan format gambar --}}
                <p style="font-size: 12px; color: var(--gray-text); margin-top: 6px;">Maksimal ukuran file: 2MB (Format: JPG, PNG, WEBP)</p>
            </div>

            <div class="umkm-form-group">
                <label class="umkm-label">Isi Cerita / Artikel *</label>
                <textarea name="content" class="umkm-textarea" rows="8" required placeholder="Tuliskan cerita lengkapnya di sini...">{{ old('content') }}</textarea>
            </div>

            <div class="umkm-form-actions">
                <button type="submit" class="umkm-btn umkm-btn--primary">✓ Terbitkan Artikel</button>
                <a href="{{ route('umkm.articles.index') }}" class="umkm-btn umkm-btn--secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection