@extends('layouts.umkm')

@section('title', 'Tambah Pesanan - UMKM')

@section('content')

{{-- ── Page Header ──────────────────────────────────────── --}}
<div class="umkm-page-header umkm-fade umkm-fade--2">
    <h1>Tambah Pesanan</h1>
    <p>Catat pesanan baru dari pelanggan Anda</p>
</div>

{{-- ── Form Card ────────────────────────────────────────── --}}
<div class="umkm-card umkm-fade umkm-fade--3" style="max-width:600px;">
    <div class="umkm-card__head">📋 Detail Pesanan</div>

    <form action="{{ route('orders.store') }}" method="POST" class="umkm-card__body">
        @csrf

        {{-- Nama & No WA --}}
        <div class="umkm-form-row">
            <div class="umkm-form-group">
                <label class="umkm-label" for="customer_name">Nama Pembeli *</label>
                <input
                    class="umkm-input"
                    type="text"
                    id="customer_name"
                    name="customer_name"
                    placeholder="Contoh: Siti Rahayu"
                    value="{{ old('customer_name') }}"
                    required>
            </div>

            <div class="umkm-form-group">
                <label class="umkm-label" for="customer_phone">No WhatsApp</label>
                <input
                    class="umkm-input"
                    type="text"
                    id="customer_phone"
                    name="customer_phone"
                    placeholder="Contoh: 08123456789"
                    value="{{ old('customer_phone') }}">
            </div>
        </div>

        {{-- Tanggal Pesanan --}}
        <div class="umkm-form-group">
            <label class="umkm-label" for="order_date">Tanggal Pesanan *</label>
            <input
                class="umkm-input"
                type="date"
                id="order_date"
                name="order_date"
                value="{{ old('order_date', date('Y-m-d')) }}"
                required>
        </div>

        {{-- Produk & Jumlah --}}
        <div class="umkm-form-row">
            <div class="umkm-form-group">
                <label class="umkm-label" for="product_id">Produk *</label>
                <select
                    class="umkm-select"
                    id="product_id"
                    name="product_id"
                    required>
                    <option value="" disabled selected>Pilih produk</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}"
                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->nama_produk }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="umkm-form-group">
                <label class="umkm-label" for="quantity">Jumlah *</label>
                <input
                    class="umkm-input"
                    type="number"
                    id="quantity"
                    name="quantity"
                    placeholder="Contoh: 2"
                    min="1"
                    value="{{ old('quantity') }}"
                    required>
            </div>
        </div>

        {{-- Actions --}}
        <div class="umkm-form-actions">
            <button type="submit" class="umkm-btn umkm-btn--primary">
                ✓ Simpan Pesanan
            </button>
            <a href="{{ route('orders') }}" class="umkm-btn umkm-btn--secondary">
                ✕ Batal
            </a>
        </div>

    </form>
</div>

@endsection