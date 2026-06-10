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

        html {
            font-size: clamp(14px, 2vw, 16px);
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: clamp(16px, 6vw, 40px) clamp(12px, 4vw, 24px);
        }

        /* Navbar */
        .dashboard-navbar {
            margin-bottom: clamp(20px, 8vw, 32px);
            display: flex;
            gap: clamp(8px, 2vw, 12px);
            flex-wrap: wrap;
            align-items: center;
        }

        .navbar-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: clamp(4px, 1vw, 6px);
            background: var(--white);
            color: var(--dark);
            padding: clamp(8px, 2vw, 10px) clamp(14px, 4vw, 18px);
            border-radius: clamp(6px, 1.5vw, 8px);
            text-decoration: none;
            font-weight: 500;
            font-size: clamp(12px, 2vw, 14px);
            border: 1px solid var(--gray-medium);
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
            min-height: 44px;
            white-space: nowrap;
        }

        .navbar-btn:hover {
            background: var(--gray-light);
            border-color: var(--gray-text);
            transform: translateY(-1px);
        }

        .navbar-btn:active {
            transform: translateY(0);
        }

        .navbar-btn.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            border-color: var(--primary);
        }

        /* Header Section */
        .page-header {
            margin-bottom: clamp(20px, 8vw, 32px);
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 0.1s;
        }

        .page-header h1 {
            font-size: clamp(24px, 8vw, 32px);
            font-weight: 700;
            color: var(--dark);
            margin-bottom: clamp(6px, 2vw, 8px);
            letter-spacing: -0.5px;
            line-height: 1.2;
        }

        .page-header p {
            color: var(--gray-text);
            font-size: clamp(13px, 3vw, 15px);
            font-weight: 400;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(clamp(250px, 100%, 350px), 1fr));
            gap: clamp(12px, 4vw, 20px);
            margin-bottom: clamp(20px, 8vw, 32px);
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 0.15s;
        }

        .stat-card {
            background: var(--white);
            border-radius: clamp(12px, 3vw, 16px);
            padding: clamp(16px, 5vw, 24px);
            box-shadow: var(--shadow-md);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            min-height: clamp(120px, 25vw, 160px);
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
            font-size: clamp(11px, 2vw, 14px);
            font-weight: 600;
            color: var(--gray-text);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: clamp(8px, 2vw, 12px);
        }

        .stat-value {
            font-size: clamp(28px, 8vw, 42px);
            font-weight: 800;
            color: var(--dark);
            line-height: 1;
        }

        .stat-icon {
            position: absolute;
            bottom: -8px;
            right: -8px;
            font-size: clamp(60px, 15vw, 80px);
            opacity: 0.08;
        }

        /* Table Container */
        .table-container {
            background: var(--white);
            border-radius: clamp(12px, 3vw, 16px);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            animation: fadeInUp 0.6s ease-out forwards;
            animation-delay: 0.2s;
        }

        .table-header {
            padding: clamp(16px, 5vw, 24px);
            background: linear-gradient(135deg, #f9fafb, #f3f4f6);
            border-bottom: 1px solid var(--gray-medium);
        }

        .table-header h2 {
            font-size: clamp(16px, 4vw, 20px);
            font-weight: 700;
            color: var(--dark);
        }

        /* Responsive Table Wrapper */
        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-wrapper::-webkit-scrollbar {
            height: 6px;
        }

        .table-wrapper::-webkit-scrollbar-track {
            background: var(--gray-light);
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: var(--gray-medium);
            border-radius: 3px;
        }

        .table-wrapper::-webkit-scrollbar-thumb:hover {
            background: var(--gray-text);
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
            padding: clamp(12px, 3vw, 16px) clamp(12px, 3vw, 20px);
            text-align: left;
            font-size: clamp(11px, 2vw, 13px);
            font-weight: 600;
            color: var(--gray-text);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--gray-medium);
            white-space: nowrap;
        }

        td {
            padding: clamp(14px, 3vw, 18px) clamp(12px, 3vw, 20px);
            border-bottom: 1px solid var(--gray-medium);
            font-size: clamp(12px, 2.5vw, 14px);
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
            padding: clamp(5px, 1.5vw, 6px) clamp(10px, 2vw, 12px);
            border-radius: 20px;
            font-size: clamp(11px, 2vw, 12px);
            font-weight: 600;
            text-transform: capitalize;
            white-space: nowrap;
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
            width: 100%;
            max-width: 100px;
            padding: clamp(6px, 1.5vw, 8px) clamp(8px, 2vw, 12px);
            border: 1.5px solid var(--gray-medium);
            border-radius: 6px;
            font-size: clamp(12px, 2.5vw, 14px);
            font-family: inherit;
            transition: all 0.2s ease;
        }

        .table-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        /* Form Group in Table */
        .form-group {
            display: flex;
            gap: clamp(6px, 1.5vw, 8px);
            align-items: center;
        }

        .form-group button {
            flex-shrink: 0;
            min-height: 36px;
            min-width: 36px;
            padding: clamp(6px, 1.5vw, 8px);
            border: 1px solid var(--gray-medium);
            background: var(--white);
            border-radius: 6px;
            cursor: pointer;
            font-size: clamp(12px, 2.5vw, 14px);
            transition: all 0.2s ease;
        }

        .form-group button:hover {
            background: var(--gray-light);
            border-color: var(--gray-text);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: clamp(6px, 1.5vw, 8px);
            flex-wrap: wrap;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            min-height: 36px;
            padding: clamp(6px, 1.5vw, 8px);
            border-radius: 6px;
            border: 1px solid var(--gray-medium);
            background: var(--white);
            cursor: pointer;
            font-size: clamp(12px, 2.5vw, 14px);
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
            padding: clamp(40px, 10vw, 60px) clamp(16px, 5vw, 20px);
            color: var(--gray-text);
        }

        .empty-state-icon {
            font-size: clamp(36px, 10vw, 48px);
            margin-bottom: clamp(12px, 3vw, 16px);
        }

        .empty-state h3 {
            font-size: clamp(16px, 4vw, 18px);
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

        /* Mobile: Card Layout */
        @media (max-width: 900px) {
            .table-wrapper {
                overflow-x: visible;
            }

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
                width: 100%;
            }

            thead {
                display: none;
            }

            tr {
                display: grid;
                grid-template-columns: 1fr;
                gap: clamp(8px, 2vw, 12px);
                margin-bottom: clamp(12px, 3vw, 16px);
                padding: clamp(14px, 4vw, 18px);
                background: var(--white);
                border-radius: 12px;
                border: 1px solid var(--gray-medium);
                box-shadow: var(--shadow-sm);
                transition: all 0.2s ease;
            }

            tr:hover {
                background: var(--white);
                box-shadow: var(--shadow-md);
            }

            tbody tr:last-child {
                margin-bottom: 0;
            }

            td {
                padding: clamp(8px, 2vw, 12px) 0;
                border-bottom: none;
                border-left: 4px solid var(--gray-medium);
                padding-left: clamp(12px, 3vw, 16px);
            }

            td::before {
                content: attr(data-label);
                display: block;
                font-weight: 600;
                color: var(--gray-text);
                font-size: clamp(11px, 2vw, 12px);
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-bottom: clamp(4px, 1vw, 6px);
            }

            td:first-child {
                border-left-color: var(--primary);
                padding-top: 0;
            }

            td:last-child {
                padding-bottom: 0;
            }

            /* Specific column labels */
            td:nth-child(1)::before { content: "Nama Produk"; }
            td:nth-child(2)::before { content: "Status"; }
            td:nth-child(3)::before { content: "Stok"; }
            td:nth-child(4)::before { content: "Diskon"; }
            td:nth-child(5)::before { content: "Aksi"; }

            .form-group {
                flex-direction: column;
                align-items: flex-start;
            }

            .table-input {
                width: 100%;
                max-width: none;
            }

            .action-buttons {
                justify-content: flex-start;
                width: 100%;
            }

            .btn-action {
                flex: 1;
                min-width: 44px;
                min-height: 44px;
            }
        }

        /* Tablet Breakpoint */
        @media (max-width: 768px) {
            .container {
                padding: clamp(12px, 3vw, 20px) clamp(10px, 3vw, 16px);
            }

            .page-header h1 {
                font-size: clamp(20px, 7vw, 28px);
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: clamp(10px, 3vw, 16px);
            }

            .navbar-btn {
                flex: 1 1 calc(50% - 4px);
                min-width: auto;
            }
        }

        /* Small Mobile */
        @media (max-width: 480px) {
            html {
                font-size: 13px;
            }

            .dashboard-navbar {
                gap: 6px;
            }

            .navbar-btn {
                flex: 1 1 calc(50% - 3px);
                min-height: 40px;
                font-size: 11px;
                padding: 6px 8px;
            }

            .page-header h1 {
                font-size: clamp(18px, 6vw, 24px);
            }

            .stats-grid {
                gap: clamp(8px, 3vw, 12px);
            }

            .stat-card {
                min-height: 100px;
                padding: clamp(14px, 3vw, 16px);
            }

            .table-header {
                padding: clamp(12px, 3vw, 16px);
            }

            .table-header h2 {
                font-size: clamp(14px, 4vw, 18px);
            }

            tr {
                margin-bottom: clamp(10px, 2.5vw, 14px);
                padding: clamp(12px, 3vw, 14px);
                border-radius: 8px;
            }

            td {
                padding: clamp(6px, 1.5vw, 8px) 0;
                padding-left: clamp(10px, 2.5vw, 12px);
                border-left-width: 3px;
                font-size: 12px;
            }

            td::before {
                font-size: 10px;
                margin-bottom: 3px;
            }

            .form-group {
                gap: 4px;
            }

            .form-group button {
                min-width: 32px;
                min-height: 32px;
                padding: 4px;
            }

            .table-input {
                font-size: 12px;
                padding: 5px 6px;
            }

            .btn-action {
                min-width: 32px;
                min-height: 32px;
            }

            .status-badge {
                font-size: 10px;
                padding: 4px 8px;
            }
        }

        /* Extra Small Mobile */
        @media (max-width: 360px) {
            .navbar-btn {
                font-size: 10px;
                padding: 6px 6px;
            }

            .stat-value {
                font-size: clamp(18px, 5vw, 28px);
            }
        }

        /* Large Desktop */
        @media (min-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
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
            <a href="{{ route('reports') }}" class="navbar-btn">📈 Laporan</a>
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

            <div class="table-wrapper">
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
                            <td data-label="Nama Produk">
                                <strong>
                                    {{ $product->nama_produk }}
                                </strong>
                            </td>

                            <td data-label="Status">
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

                            <td data-label="Stok">
                                <form
                                    action="{{ route('my-products.stock', ['product' => $product->slug]) }}"
                                    method="POST"
                                    class="form-group">

                                    @csrf
                                    @method('PATCH')

                                    <input
                                        type="number"
                                        name="stock"
                                        value="{{ $product->stock }}"
                                        class="table-input">

                                    <button type="submit" title="Simpan">
                                        💾
                                    </button>
                                </form>
                            </td>

                            <td data-label="Diskon">
                                <form
                                    action="{{ route('my-products.discount', ['product' => $product->slug]) }}"
                                    method="POST"
                                    class="form-group">

                                    @csrf
                                    @method('PATCH')

                                    <input
                                        type="number"
                                        name="discount_price"
                                        value="{{ $product->discount_price }}"
                                        min="0"
                                        max="100"
                                        class="table-input">

                                    <button type="submit" title="Simpan">
                                        💾
                                    </button>
                                </form>
                            </td>

                            <td data-label="Aksi">
                                <div class="action-buttons">
                                    <a href="/my-products/{{ $product->slug }}/edit"
                                        class="btn-action"
                                        title="Edit">
                                        ✏
                                    </a>

                                    <form method="POST"
                                        action="/my-products/{{ $product->slug }}"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn-action delete" title="Hapus">
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
    </div>
</body>

</html>