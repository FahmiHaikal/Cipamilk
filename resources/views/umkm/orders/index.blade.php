@extends('layouts.umkm')

@section('title', 'Pesanan - UMKM')

@section('content')

{{-- Header --}}
<div class="umkm-page-header umkm-fade umkm-fade--2">
    <h1>Pesanan</h1>
    <p>Kelola dan pantau riwayat pembelian produk Anda</p>
</div>

{{-- Stats --}}
<div class="umkm-stats umkm-fade umkm-fade--2">
    <div class="umkm-stat umkm-stat--green">
        <div class="umkm-stat__label">Total Pesanan</div>
        <div class="umkm-stat__value">{{ $totalOrders }}</div>
        <div class="umkm-stat__icon">📋</div>
    </div>
    <div class="umkm-stat umkm-stat--yellow">
        <div class="umkm-stat__label">Total Pendapatan</div>
        <div class="umkm-stat__value">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
        <div class="umkm-stat__icon">💰</div>
    </div>
    <div class="umkm-stat umkm-stat--red">
        <div class="umkm-stat__label">Total Qty Terjual</div>
        <div class="umkm-stat__value">{{ $totalQty }}</div>
        <div class="umkm-stat__icon">📦</div>
    </div>
</div>

{{-- Toolbar --}}
<div class="umkm-fade umkm-fade--3" style="display:flex;align-items:center;gap:12px;flex-wrap:wrap;margin-bottom:20px;">
    <button class="umkm-btn umkm-btn--primary" onclick="openOrderModal()">
        ➕ Tambah Pesanan
    </button>
    <form method="GET">
        <select class="umkm-select" name="sort" onchange="this.form.submit()"
                style="width:auto;min-width:140px;">
            <option value="newest" {{ request('sort','newest')=='newest' ? 'selected' : '' }}>🕐 Terbaru</option>
            <option value="oldest" {{ request('sort')=='oldest' ? 'selected' : '' }}>🕐 Terlama</option>
        </select>
    </form>
</div>

{{-- Table --}}
<div class="umkm-card umkm-fade umkm-fade--4">
    <div class="umkm-card__head">📊 Daftar Pesanan</div>

    @if($orders->count() > 0)
    <div class="umkm-table-wrap">
        <table class="umkm-table">
            <thead>
                <tr>
                    <th>No. Pesanan</th>
                    <th>Pembeli</th>
                    <th>Tanggal</th>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td><strong>#{{ $order->id }}</strong></td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}</td>
                    <td>{{ $order->product->nama_produk ?? '-' }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td class="umkm-currency">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('orders.status', $order->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select class="umkm-select" name="status" onchange="this.form.submit()"
                                    style="width:auto;min-width:130px;padding:6px 10px;font-size:13px;">
                                <option value="pending"    {{ $order->status=='pending'    ? 'selected':'' }}>Pending</option>
                                <option value="processing" {{ $order->status=='processing' ? 'selected':'' }}>Diproses</option>
                                <option value="completed"  {{ $order->status=='completed'  ? 'selected':'' }}>Selesai</option>
                                <option value="cancelled"  {{ $order->status=='cancelled'  ? 'selected':'' }}>Batal</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="umkm-empty">
        <div class="umkm-empty__icon">📭</div>
        <h3>Belum ada pesanan</h3>
        <p>Mulai terima pesanan dari pelanggan Anda</p>
    </div>
    @endif
</div>

{{-- Modal Tambah Pesanan --}}
<div id="orderModal" class="umkm-modal-overlay">
    <div class="umkm-modal">
        <p class="umkm-modal__title">➕ Tambah Pesanan</p>
        
        {{-- PERBAIKAN: Gunakan route('orders.store') agar URL-nya tepat menjadi /umkm/orders --}}
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="umkm-form-row">
                <div class="umkm-form-group">
                    <label class="umkm-label" for="m_name">Nama Pembeli *</label>
                    <input class="umkm-input" type="text" id="m_name" name="customer_name"
                           placeholder="Contoh: Siti Rahayu" required>
                </div>
                <div class="umkm-form-group">
                    <label class="umkm-label" for="m_phone">No WhatsApp</label>
                    <input class="umkm-input" type="text" id="m_phone" name="customer_phone"
                           placeholder="08123456789">
                </div>
            </div>
            <div class="umkm-form-group">
                <label class="umkm-label" for="m_date">Tanggal Pesanan *</label>
                <input class="umkm-input" type="date" id="m_date" name="order_date"
                       value="{{ date('Y-m-d') }}" required>
            </div>
            <div class="umkm-form-row">
                <div class="umkm-form-group">
                    <label class="umkm-label" for="m_product">Produk *</label>
                    <select class="umkm-select" id="m_product" name="product_id" required>
                        <option value="" disabled selected>Pilih produk</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->nama_produk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="umkm-form-group">
                    <label class="umkm-label" for="m_qty">Jumlah *</label>
                    <input class="umkm-input" type="number" id="m_qty" name="quantity"
                           min="1" placeholder="1" required>
                </div>
            </div>
            <div class="umkm-form-actions">
                <button type="submit" class="umkm-btn umkm-btn--primary">✓ Simpan</button>
                <button type="button" class="umkm-btn umkm-btn--secondary"
                        onclick="closeOrderModal()">✕ Batal</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const orderModal = document.getElementById('orderModal');
    function openOrderModal()  { orderModal.classList.add('open'); }
    function closeOrderModal() { orderModal.classList.remove('open'); }
    orderModal.addEventListener('click', e => { if (e.target === orderModal) closeOrderModal(); });
</script>
@endpush