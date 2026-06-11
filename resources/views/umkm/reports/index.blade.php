@extends('layouts.umkm')

@section('title', 'Laporan - UMKM')

@section('content')

{{-- Header --}}
<div class="umkm-page-header umkm-fade umkm-fade--2">
    <h1>Laporan</h1>
    <p>Analisis dan pantau performa bisnis UMKM Anda</p>
</div>

{{-- Stats --}}
<div class="umkm-stats umkm-fade umkm-fade--2">
    <div class="umkm-stat umkm-stat--green">
        <div class="umkm-stat__label">Total Penjualan</div>
        <div class="umkm-stat__value">{{ $totalProductsSold }}</div>
        <div class="umkm-stat__icon">📦</div>
    </div>
    <div class="umkm-stat umkm-stat--yellow">
        <div class="umkm-stat__label">Total Pendapatan</div>
        <div class="umkm-stat__value">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
        <div class="umkm-stat__icon">💰</div>
    </div>
    <div class="umkm-stat umkm-stat--red">
        <div class="umkm-stat__label">Rata-rata Order</div>
        <div class="umkm-stat__value">
            @if($totalOrders > 0)
                Rp {{ number_format($totalRevenue / $totalOrders, 0, ',', '.') }}
            @else
                Rp 0
            @endif
        </div>
        <div class="umkm-stat__icon">📊</div>
    </div>
</div>

{{-- Filter & Export --}}
<div class="umkm-card umkm-fade umkm-fade--3">
    <div class="umkm-card__body" style="padding-top:20px;padding-bottom:20px;">
        <div style="display:flex;align-items:flex-end;gap:16px;flex-wrap:wrap;justify-content:space-between;">
            <form method="GET" style="display:flex;gap:12px;flex-wrap:wrap;align-items:flex-end;">
                <div style="display:flex;flex-direction:column;gap:5px;">
                    <label class="umkm-label">Bulan</label>
                    <select class="umkm-select" name="month" onchange="this.form.submit()"
                            style="width:auto;min-width:140px;">
                        <option value="">Semua Bulan</option>
                        @for($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div style="display:flex;flex-direction:column;gap:5px;">
                    <label class="umkm-label">Tahun</label>
                    <select class="umkm-select" name="year" onchange="this.form.submit()"
                            style="width:auto;min-width:100px;">
                        @for($y = now()->year; $y >= 2020; $y--)
                            <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                </div>
            </form>
            <div style="display:flex;gap:8px;flex-wrap:wrap;">
                <button class="umkm-btn umkm-btn--primary">📥 Export PDF</button>
                <button class="umkm-btn umkm-btn--primary">📊 Export Excel</button>
            </div>
        </div>
    </div>
</div>

{{-- Chart --}}
<div class="umkm-card umkm-fade umkm-fade--3">
    <div class="umkm-card__head">📈 Trend Penjualan</div>
    <div class="umkm-card__body">
        <div class="umkm-chart-wrap">
            <canvas id="salesChart"></canvas>
        </div>
    </div>
</div>

{{-- Table --}}
<div class="umkm-card umkm-fade umkm-fade--4">
    <div class="umkm-card__head">📋 Ringkasan Penjualan Per Produk</div>
    <div class="umkm-table-wrap">
        <table class="umkm-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Qty Terjual</th>
                    <th>Total Penjualan</th>
                    <th>Rata-rata Harga</th>
                    <th>% dari Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productSummary as $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['qty'] }}</td>
                    <td class="umkm-currency">Rp {{ number_format($product['revenue'], 0, ',', '.') }}</td>
                    <td class="umkm-currency">Rp {{ number_format($product['avg_price'], 0, ',', '.') }}</td>
                    <td>
                        @if($totalRevenue > 0)
                            {{ round(($product['revenue'] / $totalRevenue) * 100, 1) }}%
                        @else
                            0%
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartLabels->values()->toArray()),
            datasets: [{
                label: 'Penjualan (Rp)',
                data: @json($chartValues->values()->toArray()),
                borderColor: '#10b981',
                backgroundColor: 'rgba(16,185,129,.06)',
                borderWidth: 2.5,
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#10b981',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { labels: { font: { size: 13, weight: '600' }, color: '#6b7280' } }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: v => 'Rp ' + (v / 1000000).toFixed(1) + 'jt',
                        color: '#6b7280', font: { size: 12 }
                    },
                    grid: { color: '#e5e7eb', drawBorder: false }
                },
                x: {
                    ticks: { color: '#6b7280', font: { size: 12 } },
                    grid: { display: false, drawBorder: false }
                }
            }
        }
    });
</script>
@endpush