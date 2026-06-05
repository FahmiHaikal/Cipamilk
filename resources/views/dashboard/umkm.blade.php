<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard UMKM - Kelola Bisnis Anda</title>
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

    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 40px 24px;
    }

    /* Navbar Section */
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

    /* Header Section */
    .dashboard-header {
        margin-bottom: 32px;
    }

    .dashboard-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 8px;
        letter-spacing: -0.5px;
    }

    .dashboard-header p {
        color: var(--gray-text);
        font-size: 16px;
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

    /* Action Section */
    .action-section {
        margin-bottom: 24px;
    }

    .btn-add-product {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: var(--white);
        padding: 12px 24px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .btn-add-product:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
    }

    .btn-add-product:active {
        transform: translateY(0);
    }

    /* Main Content Card */
    .content-card {
        background: var(--white);
        border-radius: 16px;
        box-shadow: var(--shadow-md);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .content-card-header {
        padding: 24px;
        background: linear-gradient(135deg, #f9fafb, #f3f4f6);
        border-bottom: 1px solid var(--gray-medium);
    }

    .content-card-header h2 {
        font-size: 22px;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 8px;
    }

    .content-card-header p {
        color: var(--gray-text);
        font-size: 15px;
        font-weight: 400;
    }

    .content-card-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 24px;
        background: var(--white);
        text-decoration: none;
        color: var(--dark);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .content-card-link:hover {
        background: var(--gray-light);
    }

    .content-card-link:hover .arrow-icon {
        transform: translateX(4px);
    }

    .arrow-icon {
        font-size: 28px;
        color: var(--primary);
        transition: transform 0.3s ease;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .dashboard-container {
            padding: 20px 16px;
        }

        .dashboard-header h1 {
            font-size: 24px;
            margin-bottom: 8px;
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

        .content-card-header,
        .content-card-link {
            padding: 16px;
        }

        .content-card-header h2 {
            font-size: 16px;
        }

        .dashboard-navbar {
            gap: 8px;
            margin-bottom: 24px;
        }

        .navbar-btn {
            padding: 8px 14px;
            font-size: 12px;
        }
    }

    /* Animation on Load */
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

    .dashboard-header,
    .stat-card,
    .action-section,
    .content-card {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .dashboard-header {
        animation-delay: 0.1s;
    }

    .stat-card:nth-child(1) {
        animation-delay: 0.2s;
    }

    .stat-card:nth-child(2) {
        animation-delay: 0.3s;
    }

    .stat-card:nth-child(3) {
        animation-delay: 0.4s;
    }

    .action-section {
        animation-delay: 0.5s;
    }

    .content-card {
        animation-delay: 0.6s;
    }
    </style>
</head>
<body>
<div class="dashboard-container">
    <!-- Navbar -->
    <div class="dashboard-navbar">
        <a href="{{ route('dashboard') }}" class="navbar-btn active">📊 Dashboard</a>
        <a href="{{ route('my-products') }}" class="navbar-btn">📦 Produk</a>
        <a href="#" class="navbar-btn">📋 Pesanan</a>
        <a href="#" class="navbar-btn">📈 Laporan</a>
        <a href="#" class="navbar-btn">⚙️ Pengaturan</a>
    </div>

    <!-- Header -->
    <div class="dashboard-header">
        <h1>Dashboard UMKM</h1>
        <p>Kelola bisnis Anda dengan mudah dan efisien</p>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card stat-products">
            <div class="stat-label">Total Produk</div>
            <div class="stat-value">{{ $totalProducts }}</div>
            <div class="stat-icon">📦</div>
        </div>

        <div class="stat-card stat-stock">
            <div class="stat-label">Total Stok</div>
            <div class="stat-value">{{ $totalStock }}</div>
            <div class="stat-icon">📊</div>
        </div>

        <div class="stat-card stat-discount">
            <div class="stat-label">Produk Diskon</div>
            <div class="stat-value">{{ $totalDiscounts }}</div>
            <div class="stat-icon">🏷️</div>
        </div>
    </div>

    <!-- Action Button -->
    <div class="action-section">
        <a href="/my-products/create" class="btn-add-product">
            <span>➕</span>
            <span>Tambah Produk Baru</span>
        </a>
    </div>

    <!-- Main Content Card -->
    <div class="content-card">
        <div class="content-card-header">
            <h2>Kelola Produk Saya</h2>
            <p>Atur stok, diskon, dan kelola semua produk UMKM Anda</p>
        </div>
        <a href="{{ route('my-products') }}" class="content-card-link">
            <div>
                <h3 style="font-size: 18px; font-weight: 600; color: var(--dark); margin-bottom: 4px;">
                    Lihat Semua Produk
                </h3>
                <p style="color: var(--gray-text); font-size: 14px;">
                    Kelola harga, stok, dan promosi produk Anda
                </p>
            </div>
            <div class="arrow-icon">→</div>
        </a>
    </div>
</div>
</body>
</html>