@extends('layouts.admin')

@section('title', 'Approval Produk')

@section('content')

<div class="page-header">
    <h1>Approval Produk</h1>
    <p>Kelola dan validasi produk dari semua UMKM terdaftar</p>
</div>

<div class="stats-grid">
    <div class="stat-card stat-total">
        <div class="stat-label">Total Produk</div>
        <div class="stat-value">{{ $totalProducts }}</div>
        <div class="stat-icon">📦</div>
    </div>

<div class="stat-card stat-approved">
    <div class="stat-label">Produk Approved</div>
    <div class="stat-value">{{ $approvedCount }}</div>
    <div class="stat-icon">✓</div>
</div>

<div class="stat-card stat-pending">
    <div class="stat-label">Produk Pending</div>
    <div class="stat-value">{{ $pendingCount }}</div>
    <div class="stat-icon">⏱</div>
</div>

</div>

<div class="filter-container">
    <a href="{{ route('admin.products.pending') }}"
       class="filter-btn {{ !request('status') ? 'active' : '' }}">
        📋 Semua Produk
    </a>

<a href="{{ route('admin.products.pending', ['status' => 'pending']) }}"
   class="filter-btn {{ request('status') == 'pending' ? 'active' : '' }}">
    ⏱ Pending
</a>

<a href="{{ route('admin.products.pending', ['status' => 'approved']) }}"
   class="filter-btn {{ request('status') == 'approved' ? 'active' : '' }}">
    ✓ Approved
</a>

</div>

<div class="table-container">
    <div class="table-header">
        <h2>📊 Daftar Produk</h2>
    </div>

<table>
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>UMKM</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Tanggal Submit</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($products as $product)
            <tr>
                <td>
                    <strong>{{ $product->nama_produk }}</strong>
                </td>

                <td>
                    {{ $product->umkm->nama_umkm }}
                </td>

                <td>
                    {{ $product->kategori }}
                </td>

                <td>
                    @if($product->status == 'approved')
                        <span class="status-badge status-approved">
                            ✓ Approved
                        </span>
                    @else
                        <span class="status-badge status-pending">
                            ⏱ Pending
                        </span>
                    @endif
                </td>

                <td>
                    {{ $product->created_at->format('d M Y H:i') }}
                </td>

                <td>
                    @if($product->status == 'pending')
                        <form action="{{ route('admin.products.approve', $product) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-approve">
                                Approve
                            </button>
                        </form>
                    @else
                        —
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align:center;padding:30px;">
                    Belum ada produk ditemukan
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

</div>

@endsection
