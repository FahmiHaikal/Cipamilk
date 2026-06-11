@extends('layouts.umkm')

@section('title', 'Tambah Produk - UMKM')

@push('styles')
<style>
    .umkm-upload-label { gap: 12px; flex-direction: column; }
    .umkm-upload-label img { max-width: 320px; max-height: 220px; object-fit: cover;
        border-radius: 8px; border: 1px solid var(--gray-medium); }
</style>
@endpush

@section('content')

<div class="umkm-card--narrow">

<div class="umkm-page-header umkm-fade umkm-fade--2">
    <h1>Tambah Produk Baru</h1>
    <p>Lengkapi semua detail produk UMKM Anda</p>
</div>

<div class="umkm-card umkm-fade umkm-fade--3">
    <div class="umkm-card__head">📦 Informasi Produk</div>

    <form method="POST" action="{{ route('my-products.store') }}"
          enctype="multipart/form-data" class="umkm-card__body">
        @csrf

        {{-- Foto Produk --}}
        <div class="umkm-form-group">
            <label class="umkm-label">Foto Produk *</label>
            <input type="file" id="image" name="image" accept="image/*"
                   style="display:none" required>

            <label for="image" class="umkm-upload-label" id="uploadLabel">
                <div style="font-size:32px;">📸</div>
                <div>
                    <p style="font-weight:600;color:var(--dark);">Pilih foto atau drag &amp; drop</p>
                    <p style="font-size:13px;color:var(--gray-text);">PNG, JPG, WEBP (Maks. 2MB)</p>
                </div>
            </label>

            <div id="previewWrap" style="display:none;margin-top:12px;text-align:center;">
                <img id="imagePreview" alt="Preview">
                <p id="imageName" style="margin-top:8px;font-size:13px;color:var(--gray-text);"></p>
                <label for="image" class="umkm-btn umkm-btn--secondary"
                       style="display:inline-flex;margin-top:8px;width:auto;">Ganti Foto</label>
            </div>
        </div>

        <div class="umkm-form-row">
            <div class="umkm-form-group">
                <label class="umkm-label" for="nama_produk">Nama Produk *</label>
                <input class="umkm-input" type="text" id="nama_produk" name="nama_produk"
                       placeholder="Contoh: Susu Segar Premium" required>
            </div>
            <div class="umkm-form-group">
                <label class="umkm-label" for="kategori">Kategori *</label>
                <select class="umkm-select" id="kategori" name="kategori" required>
                    <option value="" disabled selected>Pilih kategori</option>
                    @foreach(['Susu','Es','Kue','Yogurt','Minuman','Makanan Ringan','Keju','Mentega','Produk Kecantikan','Lainnya'] as $k)
                        <option value="{{ $k }}">{{ $k }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="umkm-form-row">
            <div class="umkm-form-group">
                <label class="umkm-label" for="harga">Harga *</label>
                <input class="umkm-input" type="number" id="harga" name="harga"
                       placeholder="Harga produk" min="0" required>
            </div>
            <div class="umkm-form-group">
                <label class="umkm-label" for="label_gizi">Label / Tag *</label>
                <input class="umkm-input" type="text" id="label_gizi" name="label_gizi"
                       placeholder="Contoh: Organik, Halal, Promo" required>
            </div>
        </div>

        <div class="umkm-form-group">
            <label class="umkm-label" for="deskripsi">Deskripsi Produk *</label>
            <textarea class="umkm-textarea" id="deskripsi" name="deskripsi"
                      placeholder="Jelaskan detail produk, bahan, manfaat..." required></textarea>
        </div>

        <div class="umkm-form-row">
            <div class="umkm-form-group">
                <label class="umkm-label" for="stock">Stok *</label>
                <input class="umkm-input" type="number" id="stock" name="stock"
                       placeholder="Jumlah stok awal" min="0" required>
            </div>
            <div class="umkm-form-group">
                <label class="umkm-label" for="discount_price">Diskon (%)</label>
                <input class="umkm-input" type="number" id="discount_price" name="discount_price"
                       placeholder="0 – 100" min="0" max="100">
            </div>
        </div>

        <div class="umkm-form-row">
            <div class="umkm-form-group">
                <label class="umkm-label" for="rating">Rating *</label>
                <input class="umkm-input" type="number" id="rating" name="rating"
                       placeholder="Contoh: 4.8" min="0" max="5" step="0.1" required>
            </div>
            <div class="umkm-form-group">
                <label class="umkm-label" for="terjual">Terjual *</label>
                <input class="umkm-input" type="number" id="terjual" name="terjual"
                       placeholder="Contoh: 150" min="0" required>
            </div>
        </div>

        <div class="umkm-form-group">
            <label class="umkm-label" for="masa_simpan">Masa Simpan *</label>
            <input class="umkm-input" type="text" id="masa_simpan" name="masa_simpan"
                   placeholder="Contoh: 7 Hari (Kulkas)" required>
        </div>

        <div class="umkm-form-actions">
            <button type="submit" class="umkm-btn umkm-btn--primary">✓ Simpan Produk</button>
            <a href="{{ route('my-products') }}" class="umkm-btn umkm-btn--secondary">✕ Batal</a>
        </div>
    </form>
</div>

</div>{{-- /.umkm-card--narrow --}}

@endsection

@push('scripts')
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = ev => {
            document.getElementById('imagePreview').src = ev.target.result;
            document.getElementById('imageName').textContent = file.name;
            document.getElementById('uploadLabel').style.display = 'none';
            document.getElementById('previewWrap').style.display = 'block';
        };
        reader.readAsDataURL(file);
    });
</script>
@endpush