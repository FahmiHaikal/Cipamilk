<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - UMKM Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #10b981;
            --primary-dark: #059669;
            --primary-light: #d1fae5;
            --secondary: #f59e0b;
            --danger: #ef4444;
            --dark: #1f2937;
            --gray-light: #f9fafb;
            --gray-medium: #e5e7eb;
            --gray-text: #6b7280;
            --white: #ffffff;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            color: var(--dark);
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 24px;
        }

        /* Navbar */
        .dashboard-navbar {
            margin-bottom: 32px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .navbar-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--white);
            color: var(--dark);
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            border: 1px solid var(--gray-medium);
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .navbar-btn:hover {
            background: var(--gray-light);
            border-color: var(--gray-text);
            transform: translateY(-1px);
        }

        .navbar-btn.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            border-color: var(--primary);
        }

        /* Header Section */
        .page-header {
            margin-bottom: 32px;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .page-header p {
            color: var(--gray-text);
            font-size: 15px;
            font-weight: 400;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--white);
            border-radius: 16px;
            padding: 24px;
            box-shadow: var(--shadow-md);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .stat-card.stat-sales::before {
            background: linear-gradient(90deg, #10b981, #059669);
        }

        .stat-card.stat-revenue::before {
            background: linear-gradient(90deg, #f59e0b, #d97706);
        }

        .stat-card.stat-orders::before {
            background: linear-gradient(90deg, #ef4444, #dc2626);
        }

        .stat-label {
            font-size: 14px;
            font-weight: 600;
            color: var(--gray-text);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .stat-value {
            font-size: 42px;
            font-weight: 800;
            color: var(--dark);
            line-height: 1;
        }

        .stat-icon {
            position: absolute;
            bottom: -8px;
            right: -8px;
            font-size: 80px;
            opacity: 0.08;
        }

        /* Filter & Export Container */
        .controls-container {
            background: var(--white);
            border-radius: 16px;
            padding: 24px;
            box-shadow: var(--shadow-md);
            margin-bottom: 32px;
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        .filter-group {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .filter-item label {
            font-size: 12px;
            font-weight: 600;
            color: var(--dark);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-item select {
            padding: 8px 12px;
            border: 1.5px solid var(--gray-medium);
            border-radius: 6px;
            font-size: 13px;
            font-family: inherit;
            transition: all 0.2s ease;
            background: var(--white);
            min-width: 120px;
        }

        .filter-item select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .export-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-export {
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.2);
        }

        .btn-export:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-export.excel {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        /* Chart Container */
        .chart-container {
            background: var(--white);
            border-radius: 16px;
            padding: 24px;
            box-shadow: var(--shadow-md);
            margin-bottom: 32px;
        }

        .chart-header {
            font-size: 16px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
        }

        .chart-wrapper {
            position: relative;
            height: 300px;
            margin-bottom: 20px;
        }

        /* Table Container */
        .table-container {
            background: var(--white);
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }

        .table-header {
            padding: 24px;
            background: linear-gradient(135deg, #f9fafb, #f3f4f6);
            border-bottom: 1px solid var(--gray-medium);
        }

        .table-header h2 {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: var(--gray-light);
        }

        th {
            padding: 16px 20px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: var(--gray-text);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--gray-medium);
        }

        td {
            padding: 18px 20px;
            border-bottom: 1px solid var(--gray-medium);
            font-size: 14px;
        }

        tbody tr {
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background: var(--gray-light);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .currency {
            font-weight: 600;
            color: var(--primary-dark);
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-header,
        .stats-grid,
        .controls-container,
        .chart-container,
        .table-container {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .page-header {
            animation-delay: 0.1s;
        }

        .stats-grid {
            animation-delay: 0.15s;
        }

        .controls-container {
            animation-delay: 0.2s;
        }

        .chart-container {
            animation-delay: 0.25s;
        }

        .table-container {
            animation-delay: 0.3s;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 20px 16px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 12px;
                margin-bottom: 24px;
            }

            .stat-card {
                padding: 16px;
            }

            .stat-value {
                font-size: 32px;
            }

            .dashboard-navbar {
                gap: 8px;
                margin-bottom: 24px;
            }

            .navbar-btn {
                padding: 8px 14px;
                font-size: 12px;
            }

            .controls-container {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-group {
                width: 100%;
            }

            .filter-item select {
                width: 100%;
            }

            .export-buttons {
                width: 100%;
            }

            .btn-export {
                flex: 1;
                justify-content: center;
            }

            .chart-wrapper {
                height: 250px;
            }

            table {
                font-size: 13px;
            }

            th,
            td {
                padding: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Navbar -->
        <div class="dashboard-navbar">
            <a href="{{ route('dashboard') }}" class="navbar-btn">📊 Dashboard</a>
            <a href="{{ route('my-products') }}" class="navbar-btn ">📦 Produk</a>
            <a href="{{ route('orders') }}" class="navbar-btn">📋 Pesanan</a>
            <a href="{{ route('reports') }}" class="navbar-btn active">📈 Laporan</a>
            <a href="#" class="navbar-btn">⚙️ Pengaturan</a>
        </div>

        <!-- Header -->
        <div class="page-header">
            <h1>Laporan</h1>
            <p>Analisis dan pantau performa bisnis UMKM Anda</p>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card stat-sales">
                <div class="stat-label">Total Penjualan</div>
                <div class="stat-value">{{ $totalProductsSold }}</div>
                <div class="stat-icon">📦</div>
            </div>

            <div class="stat-card stat-revenue">
                <div class="stat-label">Total Pendapatan</div>
                <div class="stat-value">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
                <div class="stat-icon">💰</div>
            </div>

            <div class="stat-card stat-orders">
                <div class="stat-label">Rata-rata Order</div>
                <div class="stat-value">@if($totalOrders > 0)
                    Rp {{ number_format($totalRevenue / $totalOrders,0,',','.') }}
                    @else
                    Rp 0
                    @endif</div>
                <div class="stat-icon">📊</div>
            </div>
        </div>

        <!-- Filter & Export -->
        <div class="controls-container">

            <form method="GET" class="filter-group">

                <div class="filter-item">
                    <label>Bulan</label>

                    <select
                        name="month"
                        onchange="this.form.submit()">

                        <option value="">
                            Semua Bulan
                        </option>

                        @for($i = 1; $i <= 12; $i++)
                            <option
                            value="{{ $i }}"
                            {{ request('month') == $i ? 'selected' : '' }}>

                            {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}

                            </option>
                            @endfor

                    </select>
                </div>

                <div class="filter-item">
                    <label>Tahun</label>

                    <select
                        name="year"
                        onchange="this.form.submit()">

                        @for($y = now()->year; $y >= 2020; $y--)

                        <option
                            value="{{ $y }}"
                            {{ request('year') == $y ? 'selected' : '' }}>

                            {{ $y }}

                        </option>

                        @endfor

                    </select>
                </div>

            </form>

            <div class="export-buttons">
                <button class="btn-export">
                    📥 Export PDF
                </button>

                <button class="btn-export excel">
                    📊 Export Excel
                </button>
            </div>

        </div>

        <!-- Chart -->
        <div class="chart-container">
            <h2 class="chart-header">📈 Trend Penjualan</h2>
            <div class="chart-wrapper">
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <!-- Table -->
        <div class="table-container">
            <div class="table-header">
                <h2>📋 Ringkasan Penjualan Per Produk</h2>
            </div>

            <table>
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
                        <td>
                            {{ $product['name'] }}
                        </td>
                        <td>
                            {{ $product['qty'] }}
                        </td>
                        <td>
                            Rp {{ number_format($product['revenue'],0,',','.') }}
                        </td>
                        <td>
                            Rp {{ number_format($product['avg_price'],0,',','.') }}
                        </td>
                        <td>
                            @if($totalRevenue > 0)
                            {{ round(($product['revenue'] / $totalRevenue) * 100,1) }}%
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

    <script>
        // Chart.js - Trend Penjualan
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($chartLabels->values()->toArray()),
                datasets: [{
                    label: 'Penjualan (Rp)',
                    data: @json($chartValues->values()->toArray()),
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.05)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#10b981',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            font: {
                                size: 13,
                                weight: '600'
                            },
                            color: '#6b7280',
                            padding: 15
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + (value / 1000000).toFixed(1) + 'jt';
                            },
                            font: {
                                size: 12
                            },
                            color: '#6b7280'
                        },
                        grid: {
                            color: '#e5e7eb',
                            drawBorder: false
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 12
                            },
                            color: '#6b7280'
                        },
                        grid: {
                            display: false,
                            drawBorder: false
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>