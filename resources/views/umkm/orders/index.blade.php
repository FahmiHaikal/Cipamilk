<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan - UMKM</title>
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

        .stat-card.stat-orders::before {
            background: linear-gradient(90deg, #10b981, #059669);
        }

        .stat-card.stat-revenue::before {
            background: linear-gradient(90deg, #f59e0b, #d97706);
        }

        .stat-card.stat-qty::before {
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

        /* Filter Container */
        .filter-container {
            background: var(--white);
            border-radius: 16px;
            padding: 24px;
            box-shadow: var(--shadow-md);
            margin-bottom: 32px;
        }

        .filter-header {
            font-size: 16px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 16px;
        }

        .filter-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 16px;
        }

        .filter-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .filter-item label {
            font-size: 13px;
            font-weight: 600;
            color: var(--dark);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-item select,
        .filter-item input {
            padding: 10px 14px;
            border: 1.5px solid var(--gray-medium);
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.2s ease;
            background: var(--white);
        }

        .filter-item select:focus,
        .filter-item input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .filter-actions {
            display: flex;
            gap: 12px;
            margin-top: 16px;
        }

        .btn-filter {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-filter-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.2);
        }

        .btn-filter-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-filter-secondary {
            background: var(--gray-light);
            color: var(--dark);
            border: 1.5px solid var(--gray-medium);
        }

        .btn-filter-secondary:hover {
            background: var(--gray-medium);
            border-color: var(--gray-text);
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

        .status-completed {
            background: rgba(16, 185, 129, 0.1);
            color: var(--primary-dark);
        }

        .status-pending {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
        }

        .status-cancelled {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
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

        /* Currency Format */
        .currency {
            font-weight: 600;
            color: var(--primary-dark);
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
        .filter-container,
        .table-container {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .page-header {
            animation-delay: 0.1s;
        }

        .stats-grid {
            animation-delay: 0.15s;
        }

        .filter-container {
            animation-delay: 0.2s;
        }

        .table-container {
            animation-delay: 0.25s;
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

            .filter-group {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .filter-actions {
                flex-direction: column;
                gap: 8px;
            }

            .btn-filter {
                width: 100%;
            }

            table {
                font-size: 13px;
            }

            th,
            td {
                padding: 12px;
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
            <a href="{{ route('my-products') }}" class="navbar-btn ">📦 Produk</a>
            <a href="{{ route('orders') }}" class="navbar-btn active">📋 Pesanan</a>
            <a href="{{ route('reports') }}" class="navbar-btn">📈 Laporan</a>
            <a href="#" class="navbar-btn">⚙️ Pengaturan</a>
        </div>

        <!-- Header -->
        <div class="page-header">
            <h1>Pesanan</h1>
            <p>Kelola dan pantau riwayat pembelian produk Anda</p>
        </div>




        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card stat-orders">
                <div class="stat-label">Total Pesanan</div>
                <div class="stat-value">{{ $totalOrders }}</div>
                <div class="stat-icon">📋</div>
            </div>

            <div class="stat-card stat-revenue">
                <div class="stat-label">Total Pendapatan</div>
                <div class="stat-value">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
                <div class="stat-icon">💰</div>
            </div>

            <div class="stat-card stat-qty">
                <div class="stat-label">Total Qty Terjual</div>
                <div class="stat-value">{{ $totalQty }}</div>
                <div class="stat-icon">📦</div>
            </div>
        </div>

        <div style="margin-bottom: 32px;">
            <button class="navbar-btn active" onclick="openModal()">
                ➕ Tambah Pesanan
            </button>
        </div>

        <form method="GET" style="margin-bottom:20px;">
            <select
                name="sort"
                onchange="this.form.submit()">

                <option value="newest"
                    {{ request('sort') == 'newest' ? 'selected' : '' }}>
                    Terbaru
                </option>

                <option value="oldest"
                    {{ request('sort') == 'oldest' ? 'selected' : '' }}>
                    Terlama
                </option>

            </select>
        </form>

        <!-- Table -->
        <div class="table-container">
            <div class="table-header">
                <h2>📊 Daftar Pesanan</h2>
            </div>

            @if($orders->count() > 0)
            <table>
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
                        <td class="currency">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </td>
                        <td>
                            <form
                                action="/orders/{{ $order->id }}/status"
                                method="POST">

                                @csrf
                                @method('PATCH')

                                <select
                                    name="status"
                                    onchange="this.form.submit()">

                                    <option value="pending"
                                        {{ $order->status == 'pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>

                                    <option value="processing"
                                        {{ $order->status == 'processing' ? 'selected' : '' }}>
                                        Diproses
                                    </option>

                                    <option value="completed"
                                        {{ $order->status == 'completed' ? 'selected' : '' }}>
                                        Selesai
                                    </option>

                                    <option value="cancelled"
                                        {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                        Batal
                                    </option>

                                </select>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="empty-state">
                <div class="empty-state-icon">📭</div>
                <h3>Belum ada pesanan</h3>
                <p>Mulai terima pesanan dari pelanggan Anda</p>
            </div>
            @endif
        </div>
    </div>

    <div id="orderModal"
        style="
     display:none;
     position:fixed;
     top:0;
     left:0;
     width:100%;
     height:100%;
     background:rgba(0,0,0,.5);
     z-index:9999;">

        <div style="
        background:white;
        width:500px;
        max-width:90%;
        margin:80px auto;
        padding:24px;
        border-radius:12px;">

            <h3 style="margin-bottom:20px;">
                Tambah Pesanan
            </h3>

            <form action="/orders" method="POST">
                @csrf

                <div style="margin-bottom:15px;">
                    <label>Nama Pembeli</label><br>
                    <input
                        type="text"
                        name="customer_name"
                        required
                        style="width:100%;padding:10px;">
                </div>

                <div style="margin-bottom:15px;">
                    <label>No WA</label><br>
                    <input
                        type="text"
                        name="customer_phone"
                        style="width:100%;padding:10px;">
                </div>

                <div style="margin-bottom:15px;">
                    <label>Tanggal Pesanan</label><br>

                    <input
                        type="date"
                        name="order_date"
                        value="{{ date('Y-m-d') }}"
                        required
                        style="width:100%;padding:10px;">
                </div>

                <div style="margin-bottom:15px;">
                    <label>Produk</label><br>

                    <select
                        name="product_id"
                        required
                        style="width:100%;padding:10px;">

                        @foreach($products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->nama_produk }}
                        </option>
                        @endforeach

                    </select>
                </div>

                <div style="margin-bottom:15px;">
                    <label>Jumlah</label><br>

                    <input
                        type="number"
                        name="quantity"
                        min="1"
                        required
                        style="width:100%;padding:10px;">
                </div>

                <button
                    type="submit"
                    class="navbar-btn active">
                    Simpan
                </button>

                <button
                    type="button"
                    class="navbar-btn"
                    onclick="closeModal()">
                    Batal
                </button>

            </form>

        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('orderModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('orderModal').style.display = 'none';
        }
    </script>
</body>

</html>