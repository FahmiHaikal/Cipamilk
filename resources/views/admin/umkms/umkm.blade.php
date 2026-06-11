@extends('layouts.admin')

@section('title', 'Daftar UMKM')

@section('content')

<div class="page-header">
    <h1>Daftar UMKM</h1>
    <p>Lihat dan pantau seluruh UMKM yang terdaftar</p>
</div>

<div class="stats-grid">
    <div class="stat-card stat-total">
        <div class="stat-label">Total UMKM</div>
        <div class="stat-value">{{ $umkms->count() }}</div>
        <div class="stat-icon">🏢</div>
    </div>
</div>

<div class="table-container">
    <div class="table-header">
        <h2>📊 Daftar UMKM</h2>
    </div>

```
<table>
    <thead>
        <tr>
            <th>Nama UMKM</th>
            <th>Pemilik</th>
            <th>Email Akun</th>
            <th>Whatsapp</th>
        </tr>
    </thead>

    <tbody>
        @forelse($umkms as $umkm)
            <tr>
                <td>{{ $umkm->nama_umkm }}</td>
                <td>{{ $umkm->pemilik }}</td>
                <td>{{ $umkm->user?->email }}</td>
                <td>{{ $umkm->whatsapp }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="text-align:center;padding:30px;">
                    Belum ada UMKM terdaftar
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
```

</div>

@endsection
