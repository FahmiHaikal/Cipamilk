@extends('layouts.umkm')

@section('title', 'Edit Produk - UMKM')

@section('content')

<div class="umkm-card--narrow">

<div class="umkm-page-header umkm-fade umkm-fade--2">
    <h1>Edit Produk</h1>
    <p>Perbarui informasi produk UMKM Anda</p>
</div>

<div class="umkm-card umkm-fade umkm-fade--3">
    <div class="umkm-card__head">📦 Informasi Produk</div>

    <form method="POST" action="{{ url('/my-products/' . $product->slug) }}"
          enctype="multipart/form-data" class="umkm-card__body">
        @csrf
        @method('PUT')

        {{-- Foto Produk --}}
        <div class="umkm-form-group">
            <label class="umkm-label">Foto Produk</label>
            <input type="file" id="foto" name="foto" accept="image/*" style="display:none">

            <label for="foto" class="umkm-upload-label"
                   style="flex-direction:column;gap:10px;">
                @if($product->image)
                    <img id="preview-image"
                         src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->nama_produk }}"
                         style="max-width:320px;max-height:220px;object-fit:contain;
                                border-radius:8px;border:1px solid var(--gray-medium);">
                    <p style="font-weight:600;color:var(--dark);font-size:13px;">
                        {{ basename($product->image) }}
                    </p>
                    <p style="font-size:13px;color:var(--gray-text);">Klik untuk mengganti foto</p>
                @else
                    <div style="font-size:32px;">📸</div>
                    <div>
                        <p style="font-weight:600;color:var(--dark);">Pilih foto atau drag &amp; drop</p>
                        <p style="font-size:13px;color:var(--gray-text);">PNG, JPG, GIF (Maks. 5MB)</p>
                    </div>
                @endif
            </label>
        </div>

        <div class="umkm-form-row">
            <div class="umkm-form-group">
                <label class="umkm-label" for="nama_produk">Nama Produk *</label>
                <input class="umkm-input" type="text" id="nama_produk" name="nama_produk"
                       value="{{ old('nama_produk', $product->nama_produk) }}" required>
            </div>
            <div class="umkm-form-group">
                <label class="umkm-label" for="kategori">Kategori *</label>
                <select class="umkm-select" id="kategori" name="kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach(['Susu','Es','Kue','Yogurt','Minuman','Makanan Ringan','Keju','Mentega','Produk Kecantikan','Lainnya'] as $k)
                        <option value="{{ $k }}" {{ $product->kategori == $k ? 'selected' : '' }}>{{ $k }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="umkm-form-row">
            <div class="umkm-form-group">
                <label class="umkm-label" for="harga">Harga *</label>
                <input class="umkm-input" type="number" id="harga" name="harga"
                       value="{{ old('harga', $product->harga) }}" required>
            </div>
            <div class="umkm-form-group">
                <label class="umkm-label" for="label_gizi">Label / Tag *</label>
                <input class="umkm-input" type="text" id="label_gizi" name="label_gizi"
                       value="{{ old('label_gizi', $product->label_gizi) }}" required>
            </div>
        </div>

        <div class="umkm-form-group">
            <label class="umkm-label" for="deskripsi">Deskripsi Produk *</label>
            <textarea class="umkm-textarea" id="deskripsi" name="deskripsi"
                      required>{{ old('deskripsi', $product->deskripsi) }}</textarea>
        </div>

        <div class="umkm-form-row">
            <div class="umkm-form-group">
                <label class="umkm-label" for="rating">Rating</label>
                <input class="umkm-input" type="number" step="0.1" min="0" max="5"
                       id="rating" name="rating"
                       value="{{ old('rating', $product->rating) }}">
            </div>
            <div class="umkm-form-group">
                <label class="umkm-label" for="terjual">Terjual</label>
                <input class="umkm-input" type="number" min="0"
                       id="terjual" name="terjual"
                       value="{{ old('terjual', $product->terjual) }}">
            </div>
        </div>

        <div class="umkm-form-group">
            <label class="umkm-label" for="masa_simpan">Masa Simpan</label>
            <input class="umkm-input" type="text" id="masa_simpan" name="masa_simpan"
                   value="{{ old('masa_simpan', $product->masa_simpan) }}">
        </div>

        <div class="umkm-form-actions">
            <button type="submit" class="umkm-btn umkm-btn--primary">✓ Update Produk</button>
            <a href="{{ route('my-products') }}" class="umkm-btn umkm-btn--secondary">✕ Batal</a>
        </div>
    </form>
</div>

</div>{{-- /.umkm-card--narrow --}}

@endsection

@push('scripts')
<script>
    document.getElementById('foto').addEventListener('change', function() {
        const file = this.files[0];
        if (!file) return;
        const preview = document.getElementById('preview-image');
        if (preview) preview.src = URL.createObjectURL(file);
    });
</script>
@endpush