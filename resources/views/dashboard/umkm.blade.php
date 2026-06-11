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

{{-- Action --}}
<div class="umkm-fade umkm-fade--3" style="margin-bottom:24px;">
    <a href="/my-products/create" class="umkm-btn umkm-btn--primary">
        ➕ Tambah Produk Baru
    </a>
</div>

{{-- Quick Nav Card --}}
<div class="umkm-card umkm-fade umkm-fade--4">
    <div class="umkm-card__head">
        Kelola Produk Saya
        <p style="font-size:13px;font-weight:400;color:var(--gray-text);margin-top:2px;">
            Atur stok, diskon, dan kelola semua produk UMKM Anda
        </p>
    </div>
    <a href="{{ route('my-products') }}" class="umkm-dashboard-link">
        <div>
            <h3>Lihat Semua Produk</h3>
            <p>Kelola harga, stok, dan promosi produk Anda</p>
        </div>
        <span class="umkm-dashboard-link__arrow">→</span>
    </a>
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