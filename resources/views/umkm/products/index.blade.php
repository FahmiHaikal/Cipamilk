@extends('layouts.umkm')

@section('title', 'Produk Saya - UMKM')

@section('content')

{{-- Header --}}
<div class="umkm-page-header umkm-fade umkm-fade--2">
    <h1>Produk Saya</h1>
    <p>Kelola stok, diskon, dan detail produk UMKM Anda</p>
</div>

{{-- Stats --}}
<div class="umkm-stats umkm-fade umkm-fade--2">
    <div class="umkm-stat umkm-stat--green">
        <div class="umkm-stat__label">Total Produk</div>
        <div class="umkm-stat__value">{{ $products->count() }}</div>
        <div class="umkm-stat__icon">📦</div>
    </div>
    <div class="umkm-stat umkm-stat--yellow">
        <div class="umkm-stat__label">Total Stok</div>
        <div class="umkm-stat__value">{{ $products->sum('stock') }}</div>
        <div class="umkm-stat__icon">📊</div>
    </div>
    <div class="umkm-stat umkm-stat--red">
        <div class="umkm-stat__label">Produk Diskon</div>
        <div class="umkm-stat__value">{{ $products->where('discount_price', '>', 0)->count() }}</div>
        <div class="umkm-stat__icon">🏷️</div>
    </div>
</div>

{{-- Table --}}
<div class="umkm-card umkm-fade umkm-fade--3">
    <div class="umkm-card__head">📋 Daftar Produk</div>

    <div class="umkm-table-wrap">
        <table class="umkm-table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Status</th>
                    <th>Stok</th>
                    <th>Diskon (%)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td><strong>{{ $product->nama_produk }}</strong></td>

                    <td>
                        @if($product->status === 'approved')
                            <span class="umkm-badge umkm-badge--green">✓ Approved</span>
                        @elseif($product->status === 'pending')
                            <span class="umkm-badge umkm-badge--yellow">⏱ Pending</span>
                        @else
                            <span class="umkm-badge umkm-badge--red">✕ Rejected</span>
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('my-products.stock', ['product' => $product->slug]) }}"
                              method="POST" style="display:flex;gap:6px;align-items:center;">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="stock" value="{{ $product->stock }}"
                                   class="umkm-input" style="width:80px;padding:6px 8px;">
                            <button type="submit" class="umkm-btn umkm-btn--secondary umkm-btn--icon"
                                    title="Simpan">💾</button>
                        </form>
                    </td>

                    <td>
                        <form action="{{ route('my-products.discount', ['product' => $product->slug]) }}"
                              method="POST" style="display:flex;gap:6px;align-items:center;">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="discount_price" value="{{ $product->discount_price }}"
                                   min="0" max="100"
                                   class="umkm-input" style="width:80px;padding:6px 8px;">
                            <button type="submit" class="umkm-btn umkm-btn--secondary umkm-btn--icon"
                                    title="Simpan">💾</button>
                        </form>
                    </td>

                    <td>
                        <div style="display:flex;gap:6px;">
                            <a href="/my-products/{{ $product->slug }}/edit"
                               class="umkm-btn umkm-btn--secondary umkm-btn--icon" title="Edit">✏️</a>
                            <form method="POST" action="/my-products/{{ $product->slug }}">
                                @csrf
                                @method('DELETE')
                                <button class="umkm-btn umkm-btn--danger umkm-btn--icon" title="Hapus">🗑</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection