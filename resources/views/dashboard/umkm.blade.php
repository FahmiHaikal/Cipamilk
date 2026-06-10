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

    html {
        font-size: clamp(14px, 2vw, 16px);
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        color: var(--dark);
        line-height: 1.6;
    }

    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: clamp(16px, 6vw, 40px) clamp(12px, 4vw, 24px);
    }

    /* Navbar Section */
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
        background: var(--primary);
        color: var(--white);
        border-color: var(--primary);
    }

    /* Header Section */
    .dashboard-header {
        margin-bottom: clamp(20px, 8vw, 32px);
        animation: fadeInUp 0.6s ease-out forwards;
        animation-delay: 0.1s;
    }

    .dashboard-header h1 {
        font-size: clamp(24px, 8vw, 36px);
        font-weight: 700;
        color: var(--dark);
        margin-bottom: clamp(6px, 2vw, 8px);
        letter-spacing: -0.5px;
        line-height: 1.2;
    }

    .dashboard-header p {
        color: var(--gray-text);
        font-size: clamp(13px, 3vw, 16px);
        font-weight: 400;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(clamp(250px, 100%, 350px), 1fr));
        gap: clamp(12px, 4vw, 20px);
        margin-bottom: clamp(20px, 8vw, 32px);
    }

    .stat-card {
        background: var(--white);
        border-radius: clamp(12px, 3vw, 16px);
        padding: clamp(16px, 5vw, 24px);
        box-shadow: var(--shadow-md);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        min-height: clamp(140px, 30vw, 200px);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        animation: fadeInUp 0.6s ease-out forwards;
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

    .stat-card:nth-child(1) {
        animation-delay: 0.2s;
    }

    .stat-card:nth-child(2) {
        animation-delay: 0.3s;
    }

    .stat-card:nth-child(3) {
        animation-delay: 0.4s;
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
        margin-bottom: 8px;
    }

    .stat-icon {
        position: absolute;
        bottom: -8px;
        right: -8px;
        font-size: clamp(60px, 15vw, 80px);
        opacity: 0.08;
    }

    /* Action Section */
    .action-section {
        margin-bottom: clamp(16px, 6vw, 24px);
        animation: fadeInUp 0.6s ease-out forwards;
        animation-delay: 0.5s;
    }

    .btn-add-product {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: clamp(6px, 1.5vw, 8px);
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: var(--white);
        padding: clamp(10px, 2.5vw, 12px) clamp(18px, 4vw, 24px);
        border-radius: clamp(10px, 2vw, 12px);
        text-decoration: none;
        font-weight: 600;
        font-size: clamp(13px, 2.5vw, 14px);
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        min-height: 44px;
        white-space: nowrap;
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
        border-radius: clamp(12px, 3vw, 16px);
        box-shadow: var(--shadow-md);
        overflow: hidden;
        transition: all 0.3s ease;
        animation: fadeInUp 0.6s ease-out forwards;
        animation-delay: 0.6s;
    }

    .content-card-header {
        padding: clamp(16px, 5vw, 24px);
        background: linear-gradient(135deg, #f9fafb, #f3f4f6);
        border-bottom: 1px solid var(--gray-medium);
    }

    .content-card-header h2 {
        font-size: clamp(18px, 5vw, 22px);
        font-weight: 700;
        color: var(--dark);
        margin-bottom: clamp(4px, 1vw, 8px);
    }

    .content-card-header p {
        color: var(--gray-text);
        font-size: clamp(13px, 2.5vw, 15px);
        font-weight: 400;
    }

    .content-card-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: clamp(16px, 4vw, 24px);
        padding: clamp(16px, 5vw, 24px);
        background: var(--white);
        text-decoration: none;
        color: var(--dark);
        transition: all 0.3s ease;
        cursor: pointer;
        min-height: 70px;
        flex-wrap: wrap;
    }

    .content-card-link:hover {
        background: var(--gray-light);
    }

    .content-card-link:hover .arrow-icon {
        transform: translateX(4px);
    }

    .content-card-link h3 {
        font-size: clamp(16px, 3.5vw, 18px);
        font-weight: 600;
        color: var(--dark);
        margin-bottom: clamp(2px, 1vw, 4px);
    }

    .content-card-link p {
        color: var(--gray-text);
        font-size: clamp(13px, 2.5vw, 14px);
    }

    .arrow-icon {
        font-size: clamp(20px, 6vw, 28px);
        color: var(--primary);
        transition: transform 0.3s ease;
        flex-shrink: 0;
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

    /* Tablet Breakpoint (768px) */
    @media (max-width: 768px) {
        .dashboard-container {
            padding: clamp(12px, 3vw, 20px) clamp(10px, 3vw, 16px);
        }

        .stats-grid {
            grid-template-columns: 1fr;
            gap: clamp(10px, 3vw, 16px);
        }

        .stat-card {
            min-height: 120px;
        }

        .navbar-btn {
            flex: 1 1 auto;
            min-width: 120px;
        }
    }

    /* Small Tablet Breakpoint (600px) */
    @media (max-width: 600px) {
        .dashboard-header h1 {
            font-size: clamp(20px, 7vw, 28px);
        }

        .navbar-btn {
            flex: 1 1 calc(50% - 4px);
            min-width: auto;
            font-size: clamp(11px, 2.5vw, 13px);
            padding: 8px 10px;
        }

        .stat-card {
            min-height: 110px;
        }

        .stat-value {
            font-size: clamp(24px, 7vw, 36px);
        }

        .btn-add-product {
            width: 100%;
            justify-content: center;
        }

        .content-card-link {
            flex-direction: column;
            align-items: flex-start;
            min-height: auto;
        }

        .arrow-icon {
            align-self: flex-start;
        }
    }

    /* Mobile Breakpoint (480px) */
    @media (max-width: 480px) {
        :root {
            font-size: 14px;
        }

        .dashboard-container {
            padding: clamp(10px, 2.5vw, 16px) clamp(8px, 2vw, 12px);
        }

        .dashboard-header {
            margin-bottom: clamp(16px, 5vw, 24px);
        }

        .dashboard-header h1 {
            font-size: clamp(18px, 6vw, 24px);
            margin-bottom: 6px;
        }

        .dashboard-header p {
            font-size: clamp(12px, 3vw, 14px);
        }

        .dashboard-navbar {
            gap: 6px;
            margin-bottom: clamp(16px, 4vw, 20px);
        }

        .navbar-btn {
            flex: 1 1 calc(50% - 3px);
            font-size: clamp(10px, 2.5vw, 12px);
            padding: 8px 8px;
            gap: 3px;
        }

        .stats-grid {
            gap: clamp(8px, 3vw, 12px);
            margin-bottom: clamp(16px, 5vw, 20px);
        }

        .stat-card {
            padding: clamp(14px, 4vw, 16px);
            min-height: 100px;
            border-radius: 10px;
        }

        .stat-label {
            font-size: clamp(10px, 2vw, 12px);
            margin-bottom: 6px;
        }

        .stat-value {
            font-size: clamp(22px, 6vw, 32px);
        }

        .stat-icon {
            font-size: clamp(50px, 12vw, 70px);
        }

        .action-section {
            margin-bottom: clamp(14px, 4vw, 20px);
        }

        .btn-add-product {
            font-size: clamp(12px, 2vw, 13px);
            padding: 10px 16px;
            width: 100%;
        }

        .content-card {
            border-radius: 10px;
        }

        .content-card-header {
            padding: clamp(14px, 4vw, 16px);
        }

        .content-card-header h2 {
            font-size: clamp(16px, 4vw, 18px);
            margin-bottom: 4px;
        }

        .content-card-header p {
            font-size: clamp(12px, 2.5vw, 13px);
        }

        .content-card-link {
            padding: clamp(14px, 4vw, 16px);
            gap: clamp(12px, 3vw, 16px);
            min-height: auto;
        }

        .content-card-link h3 {
            font-size: clamp(14px, 3vw, 16px);
        }

        .content-card-link p {
            font-size: clamp(12px, 2.5vw, 13px);
        }

        .arrow-icon {
            font-size: clamp(18px, 5vw, 24px);
        }
    }

    /* Extra Small Mobile (360px) */
    @media (max-width: 360px) {
        .navbar-btn {
            font-size: 10px;
            padding: 6px 6px;
        }

        .stat-value {
            font-size: clamp(20px, 6vw, 28px);
        }
    }

    /* Large Desktop (1200px+) */
    @media (min-width: 1200px) {
        .dashboard-navbar {
            gap: 16px;
        }

        .navbar-btn {
            padding: 10px 20px;
        }

        .stats-grid {
            grid-template-columns: repeat(3, 1fr);
        }
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
            <div>
                <div class="stat-label">Total Produk</div>
                <div class="stat-value">{{ $totalProducts }}</div>
            </div>
            <div class="stat-icon">📦</div>
        </div>

        <div class="stat-card stat-stock">
            <div>
                <div class="stat-label">Total Stok</div>
                <div class="stat-value">{{ $totalStock }}</div>
            </div>
            <div class="stat-icon">📊</div>
        </div>

        <div class="stat-card stat-discount">
            <div>
                <div class="stat-label">Produk Diskon</div>
                <div class="stat-value">{{ $totalDiscounts }}</div>
            </div>
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
                <h3>Lihat Semua Produk</h3>
                <p>Kelola harga, stok, dan promosi produk Anda</p>
            </div>
            <div class="arrow-icon">→</div>
        </a>
    </div>
</div>
</body>
</html>