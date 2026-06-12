@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('content')

<style>
    .status-pending {
        background: rgba(245, 158, 11, 0.1) !important;
        color: #d97706 !important;
    }
    .status-rejected {
        background: rgba(239, 68, 68, 0.1) !important;
        color: var(--danger) !important;
    }
    .btn-reject {
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        background: rgba(245, 158, 11, 0.1);
        color: #d97706;
        border: 1px solid rgba(245, 158, 11, 0.2);
    }
    .btn-reject:hover {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #fff;
        border-color: #f59e0b;
        transform: translateY(-1px);
    }
    .btn-delete {
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger);
        border: 1px solid rgba(239, 68, 68, 0.2);
    }
    .btn-delete:hover {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: #fff;
        border-color: #ef4444;
        transform: translateY(-1px);
    }
    .alert-success {
        background: rgba(16, 185, 129, 0.1);
        border: 1px solid rgba(16, 185, 129, 0.2);
        color: var(--primary-dark);
        padding: 16px;
        border-radius: 12px;
        margin-bottom: 24px;
        font-weight: 500;
        animation: fadeInUp 0.6s ease-out forwards;
    }
    .action-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
</style>

<div class="page-header">
    <h1>Kelola Produk</h1>
    <p>Validasi dan atur produk dari seluruh mitra UMKM terdaftar</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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

    <a href="{{ route('admin.products.pending', ['status' => 'rejected']) }}"
       class="filter-btn {{ request('status') == 'rejected' ? 'active' : '' }}">
        ✕ Rejected
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
                        {{ $product->umkm?->nama_umkm ?? 'UMKM Terhapus' }}
                    </td>

                    <td>
                        {{ $product->kategori }}
                    </td>

                    <td>
                        @if($product->status == 'approved')
                            <span class="status-badge status-approved">
                                ✓ Approved
                            </span>
                        @elseif($product->status == 'rejected')
                            <span class="status-badge status-rejected">
                                ✕ Rejected
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
                        <div class="action-buttons">
                            @if($product->status != 'approved')
                                <form action="{{ route('admin.products.approve', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn-approve">
                                        Approve
                                    </button>
                                </form>
                            @endif

                            @if($product->status != 'rejected')
                                <form action="{{ route('admin.products.reject', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn-reject">
                                        Reject
                                    </button>
                                </form>
                            @endif

                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini secara permanen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">
                                    Delete
                                </button>
                            </form>
                        </div>
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
