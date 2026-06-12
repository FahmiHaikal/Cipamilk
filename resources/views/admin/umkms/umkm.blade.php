@extends('layouts.admin')

@section('title', 'Daftar UMKM')

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
    <h1>Daftar UMKM</h1>
    <p>Lihat, pantau, dan verifikasi seluruh mitra UMKM yang terdaftar</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="stats-grid">
    <div class="stat-card stat-total">
        <div class="stat-label">Total UMKM</div>
        <div class="stat-value">{{ $totalUmkm }}</div>
        <div class="stat-icon">🏢</div>
    </div>
    
    <div class="stat-card stat-approved">
        <div class="stat-label">UMKM Approved</div>
        <div class="stat-value">{{ $approvedUmkm }}</div>
        <div class="stat-icon">✓</div>
    </div>

    <div class="stat-card stat-pending">
        <div class="stat-label">UMKM Pending</div>
        <div class="stat-value">{{ $pendingUmkm }}</div>
        <div class="stat-icon">⏱</div>
    </div>
</div>

<div class="table-container">
    <div class="table-header">
        <h2>📊 Daftar Mitra UMKM</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama UMKM</th>
                <th>Pemilik</th>
                <th>Email Akun</th>
                <th>Whatsapp</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($umkms as $umkm)
                <tr>
                    <td>
                        <strong>{{ $umkm->nama_umkm }}</strong>
                    </td>
                    <td>{{ $umkm->pemilik ?? '-' }}</td>
                    <td>{{ $umkm->user?->email ?? 'Akun Terhapus' }}</td>
                    <td>{{ $umkm->whatsapp }}</td>
                    <td>
                        @if($umkm->status == 'approved')
                            <span class="status-badge status-approved">
                                ✓ Approved
                            </span>
                        @elseif($umkm->status == 'rejected')
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
                        <div class="action-buttons">
                            @if($umkm->status != 'approved')
                                <form action="{{ route('admin.umkms.approve', $umkm->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn-approve">
                                        Approve
                                    </button>
                                </form>
                            @endif

                            @if($umkm->status != 'rejected')
                                <form action="{{ route('admin.umkms.reject', $umkm->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn-reject">
                                        Reject
                                    </button>
                                </form>
                            @endif

                            <form action="{{ route('admin.umkms.destroy', $umkm->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus UMKM ini beserta seluruh data akun penggunanya?')">
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
                        Belum ada UMKM terdaftar
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
