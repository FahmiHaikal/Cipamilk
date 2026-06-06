<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Saya - UMKM</title>
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
            transition: height 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .stat-card.stat-products::before {
            background: linear-gradient(90deg, #10b981, #059669);
        }

        .stat-card.stat-stock::before {
            background: linear-gradient(90deg, #f59e0b, #d97706);
        }

        .stat-card.stat-discount::before {
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

        /* Table Styles */
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

        /* Status Badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .status-approved {
            background: rgba(16, 185, 129, 0.1);
            color: var(--primary-dark);
        }

        .status-pending {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
        }

        .status-rejected {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        /* Input in Table */
        .table-input {
            width: 80px;
            padding: 8px 12px;
            border: 1.5px solid var(--gray-medium);
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.2s ease;
        }

        .table-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 6px;
            border: 1px solid var(--gray-medium);
            background: var(--white);
            cursor: pointer;
            font-size: 14px;
            transition: all 0.2s ease;
            text-decoration: none;
            color: var(--dark);
        }

        .btn-action:hover {
            background: var(--gray-light);
            border-color: var(--gray-text);
        }

        .btn-action.delete:hover {
            background: rgba(239, 68, 68, 0.1);
            border-color: var(--danger);
            color: var(--danger);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--gray-text);
        }

        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 16px;
        }

        .empty-state h3 {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
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
        .table-container {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .page-header {
            animation-delay: 0.1s;
        }

        .stats-grid {
            animation-delay: 0.15s;
        }

        .table-container {
            animation-delay: 0.2s;
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

            table {
                font-size: 13px;
            }

            th,
            td {
                padding: 12px;
            }

            .table-input {
                width: 60px;
                padding: 6px 8px;
                font-size: 12px;
            }

            .btn-action {
                width: 32px;
                height: 32px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Navbar -->
        <div class="dashboard-navbar">
            <a href="{{ route('dashboard') }}" class="navbar-btn">📊 Dashboard</a>
            <a href="{{ route('my-products') }}" class="navbar-btn active">📦 Produk</a>
            <a href="{{ route('orders') }}" class="navbar-btn">📋 Pesanan</a>
            <a href="#" class="navbar-btn">📈 Laporan</a>
            <a href="#" class="navbar-btn">⚙️ Pengaturan</a>
        </div>

        <!-- Header -->
        <div class="page-header">
            <h1>Produk Saya</h1>
            <p>Kelola stok, diskon, dan detail produk UMKM Anda</p>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card stat-products">
                <div class="stat-label">Total Produk</div>
                <div class="stat-value">
                    {{ $products->count() }}
                </div>
                <div class="stat-icon">📦</div>
            </div>

            <div class="stat-card stat-stock">
                <div class="stat-label">Total Stok</div>
                <div class="stat-value">
                    {{ $products->sum('stock') }}
                </div>
                <div class="stat-icon">📊</div>
            </div>

            <div class="stat-card stat-discount">
                <div class="stat-label">Produk Diskon</div>
                <div class="stat-value">
                    {{ $products->where('discount_price', '>', 0)->count() }}
                </div>
                <div class="stat-icon">🏷️</div>
            </div>
        </div>

        <!-- Table -->
        <div class="table-container">
            <div class="table-header">
                <h2>📋 Daftar Produk</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Status</th>
                        <th>Stok</th>
                        <th>Diskon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($products as $product)

                    <tr>

                        <td>
                            <strong>
                                {{ $product->nama_produk }}
                            </strong>
                        </td>

                        <td>

                            @if($product->status === 'approved')

                            <span class="status-badge status-approved">
                                ✓ Approved
                            </span>

                            @elseif($product->status === 'pending')

                            <span class="status-badge status-pending">
                                ⏱ Pending
                            </span>

                            @else

                            <span class="status-badge status-rejected">
                                ✕ Rejected
                            </span>

                            @endif

                        </td>

                        <td>
                            <form
                                action="/my-products/{{ $product->id }}/stock"
                                method="POST"
                                class="inline-flex gap-2">

                                @csrf
                                @method('PATCH')

                                <input
                                    type="number"
                                    name="stock"
                                    value="{{ $product->stock }}"
                                    class="w-20 border rounded px-2">

                                <button type="submit">
                                    💾
                                </button>

                            </form>
                        </td>

                        <td>
                            <form
                                action="/my-products/{{ $product->id }}/discount"
                                method="POST"
                                class="inline-flex gap-2">

                                @csrf
                                @method('PATCH')

                                <input
                                    type="number"
                                    name="discount_price"
                                    value="{{ $product->discount_price }}"
                                    min="0"
                                    max="100"
                                    class="w-20 border rounded px-2">

                                <button type="submit">
                                    💾
                                </button>

                            </form>
                        </td>

                        <td>

                            <div class="action-buttons">

                                <a href="/my-products/{{ $product->id }}/edit"
                                    class="btn-action">

                                    ✏

                                </a>

                                <form method="POST"
                                    action="/my-products/{{ $product->id }}">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn-action delete">
                                        🗑
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>