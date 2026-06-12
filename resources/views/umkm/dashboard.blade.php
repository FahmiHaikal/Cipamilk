@extends('layouts.umkm')

@section('title', 'Dashboard UMKM')

@section('content')

{{-- Header --}}
<div class="umkm-page-header umkm-fade umkm-fade--2">
    <h1>Dashboard UMKM</h1>
    <p>Kelola bisnis Anda dengan mudah dan efisien</p>
</div>

{{-- Stats --}}
<div class="umkm-stats umkm-fade umkm-fade--2">
    <div class="umkm-stat umkm-stat--green">
        <div class="umkm-stat__label">Total Produk</div>
        <div class="umkm-stat__value">{{ $totalProducts }}</div>
        <div class="umkm-stat__icon">📦</div>
    </div>
    <div class="umkm-stat umkm-stat--yellow">
        <div class="umkm-stat__label">Total Stok</div>
        <div class="umkm-stat__value">{{ $totalStock }}</div>
        <div class="umkm-stat__icon">📊</div>
    </div>
    <div class="umkm-stat umkm-stat--red">
        <div class="umkm-stat__label">Produk Diskon</div>
        <div class="umkm-stat__value">{{ $totalDiscounts }}</div>
        <div class="umkm-stat__icon">🏷️</div>
    </div>
</div>

{{-- Actions --}}
<div class="umkm-fade umkm-fade--3" style="margin-bottom:24px; display: flex; gap: 12px; flex-wrap: wrap;">
    <a href="{{ route('products.create') }}" class="umkm-btn umkm-btn--primary">
        ➕ Tambah Produk Baru
    </a>
    <a href="{{ route('umkm.articles.create') }}" class="umkm-btn umkm-btn--secondary" style="background: white;">
        📝 Tulis Artikel Baru
    </a>
</div>

{{-- Quick Nav Cards (Dibuat Grid agar sejajar) --}}
<div class="umkm-fade umkm-fade--4" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
    
    {{-- Card 1: Kelola Produk --}}
    <div class="umkm-card" style="margin: 0;">
        <div class="umkm-card__head">
            📦 Kelola Produk
            <p style="font-size:13px;font-weight:400;color:var(--gray-text);margin-top:2px;">
                Atur stok, diskon, dan kelola semua produk UMKM Anda
            </p>
        </div>
        <a href="{{ route('my-products') }}" class="umkm-dashboard-link">
            <div>
                <h3>Lihat Semua Produk</h3>
                <p>Kelola harga, stok, dan promosi</p>
            </div>
            <span class="umkm-dashboard-link__arrow">→</span>
        </a>
    </div>

    {{-- Card 2: Kelola Artikel --}}
    <div class="umkm-card" style="margin: 0;">
        <div class="umkm-card__head">
            📝 Kelola Jurnal & Prestasi
            <p style="font-size:13px;font-weight:400;color:var(--gray-text);margin-top:2px;">
                Bagikan cerita, pencapaian, dan berita toko Anda
            </p>
        </div>
        <a href="{{ route('umkm.articles.index') }}" class="umkm-dashboard-link">
            <div>
                <h3>Lihat Semua Artikel</h3>
                <p>Kelola publikasi dan portofolio UMKM</p>
            </div>
            <span class="umkm-dashboard-link__arrow">→</span>
        </a>
    </div>

</div>

@endsection

@push('styles')
<style>
    .umkm-dashboard-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 20px 24px;
        text-decoration: none;
        color: var(--dark);
        transition: background .2s;
        min-height: 68px;
        border-bottom-left-radius: inherit;
        border-bottom-right-radius: inherit;
    }
    .umkm-dashboard-link:hover { background: var(--gray-light); }
    .umkm-dashboard-link h3 { font-size: 16px; font-weight: 600; margin-bottom: 2px; }
    .umkm-dashboard-link p  { font-size: 13px; color: var(--gray-text); }
    .umkm-dashboard-link__arrow {
        font-size: 24px;
        color: var(--primary);
        flex-shrink: 0;
        transition: transform .2s;
    }
    .umkm-dashboard-link:hover .umkm-dashboard-link__arrow { transform: translateX(4px); }
</style>
@endpush