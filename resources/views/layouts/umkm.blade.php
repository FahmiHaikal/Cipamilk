<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UMKM Dashboard')</title>
    <style>
        /* ─── Reset & Tokens ─────────────────────────────── */
        *,
        *::before,
        *::after {
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
            --shadow-sm: 0 1px 2px rgba(0, 0, 0, .05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, .1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, .1);
            --radius-sm: 6px;
            --radius-md: 8px;
            --radius-lg: 16px;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            color: var(--dark);
            min-height: 100vh;
            line-height: 1.6;
        }

        /* ─── Page Wrapper ───────────────────────────────── */
        .umkm-layout {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px 20px 48px;
        }

        .umkm-card--narrow {
            max-width: 1000px;
            margin: 0 auto;
        }

        /* ─── Navbar ─────────────────────────────────────── */
        .umkm-navbar {
            max-width: 1000px;
            margin: 0 auto 28px;
        }

        .umkm-navbar__inner {
            display: flex;
            justify-content: center;
            gap: 8px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .umkm-navbar__inner::-webkit-scrollbar {
            display: none;
        }

        .umkm-navbar__btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
            /* ← never wraps */
            flex-shrink: 0;
            /* ← never squishes */
            padding: 9px 16px;
            border-radius: var(--radius-md);
            border: 1.5px solid var(--gray-medium);
            background: var(--white);
            color: var(--dark);
            font-size: 13px;
            font-weight: 500;
            font-family: inherit;
            text-decoration: none;
            cursor: pointer;
            transition: background .2s, border-color .2s, transform .15s, box-shadow .2s;
            box-shadow: var(--shadow-sm);
            min-height: 40px;
        }

        .umkm-navbar__btn:hover {
            background: var(--gray-light);
            border-color: var(--gray-text);
            transform: translateY(-1px);
        }

        .umkm-navbar__btn:active {
            transform: translateY(0);
        }

        .umkm-navbar__btn.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            border-color: var(--primary);
            box-shadow: 0 2px 8px rgba(16, 185, 129, .25);
        }

        /* ─── Page Header ────────────────────────────────── */
        .umkm-page-header {
            margin-bottom: 28px;
        }

        .umkm-page-header h1 {
            font-size: clamp(22px, 5vw, 30px);
            font-weight: 700;
            letter-spacing: -.4px;
            line-height: 1.2;
            margin-bottom: 4px;
        }

        .umkm-page-header p {
            color: var(--gray-text);
            font-size: 14px;
        }

        /* ─── Stat Cards ─────────────────────────────────── */
        .umkm-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 16px;
            margin-bottom: 28px;
        }

        .umkm-stat {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 22px 24px;
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
            transition: transform .25s, box-shadow .25s;
        }

        .umkm-stat:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
        }

        .umkm-stat::before {
            content: '';
            position: absolute;
            inset: 0 0 auto 0;
            height: 3px;
        }

        .umkm-stat--green::before {
            background: linear-gradient(90deg, #10b981, #059669);
        }

        .umkm-stat--yellow::before {
            background: linear-gradient(90deg, #f59e0b, #d97706);
        }

        .umkm-stat--red::before {
            background: linear-gradient(90deg, #ef4444, #dc2626);
        }

        .umkm-stat__label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .6px;
            color: var(--gray-text);
            margin-bottom: 8px;
        }

        .umkm-stat__value {
            font-size: clamp(28px, 6vw, 40px);
            font-weight: 800;
            line-height: 1;
        }

        .umkm-stat__icon {
            position: absolute;
            bottom: -10px;
            right: -6px;
            font-size: 72px;
            opacity: .07;
            pointer-events: none;
        }

        /* ─── Card / Panel ───────────────────────────────── */
        .umkm-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            margin-bottom: 28px;
        }

        .umkm-card__head {
            padding: 18px 24px;
            background: linear-gradient(135deg, #f9fafb, #f3f4f6);
            border-bottom: 1px solid var(--gray-medium);
            font-size: 15px;
            font-weight: 700;
        }

        .umkm-card__body {
            padding: 28px 24px;
        }

        /* ─── Form Elements ──────────────────────────────── */
        .umkm-form-group {
            margin-bottom: 20px;
        }

        .umkm-form-group:last-child {
            margin-bottom: 0;
        }

        .umkm-label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
            color: var(--dark);
            margin-bottom: 6px;
        }

        .umkm-input,
        .umkm-select,
        .umkm-textarea {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid var(--gray-medium);
            border-radius: var(--radius-md);
            font-family: inherit;
            font-size: 14px;
            color: var(--dark);
            background: var(--white);
            transition: border-color .2s, box-shadow .2s;
        }

        .umkm-input:focus,
        .umkm-select:focus,
        .umkm-textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, .12);
        }

        .umkm-textarea {
            resize: vertical;
            min-height: 110px;
        }

        .umkm-form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }

        .umkm-form-actions {
            display: flex;
            gap: 10px;
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid var(--gray-medium);
        }

        /* ─── Buttons ────────────────────────────────────── */
        .umkm-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 10px 22px;
            border-radius: var(--radius-md);
            border: none;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: transform .2s, box-shadow .2s, background .2s;
            min-height: 40px;
        }

        .umkm-btn--primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            box-shadow: 0 3px 10px rgba(16, 185, 129, .25);
        }

        .umkm-btn--primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, .35);
        }

        .umkm-btn--secondary {
            background: var(--gray-light);
            color: var(--dark);
            border: 1.5px solid var(--gray-medium);
        }

        .umkm-btn--secondary:hover {
            background: var(--gray-medium);
            border-color: var(--gray-text);
        }

        .umkm-btn--danger {
            background: rgba(239, 68, 68, .08);
            color: var(--danger);
            border: 1.5px solid rgba(239, 68, 68, .2);
        }

        .umkm-btn--danger:hover {
            background: rgba(239, 68, 68, .15);
            border-color: var(--danger);
        }

        /* Small icon-button used in tables */
        .umkm-btn--icon {
            padding: 0;
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
        }

        /* ─── Table ──────────────────────────────────────── */
        .umkm-table-wrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .umkm-table {
            width: 100%;
            border-collapse: collapse;
        }

        .umkm-table thead {
            background: var(--gray-light);
        }

        .umkm-table th {
            padding: 14px 18px;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            color: var(--gray-text);
            text-transform: uppercase;
            letter-spacing: .5px;
            border-bottom: 1px solid var(--gray-medium);
            white-space: nowrap;
        }

        .umkm-table td {
            padding: 16px 18px;
            font-size: 14px;
            border-bottom: 1px solid var(--gray-medium);
        }

        .umkm-table tbody tr {
            transition: background .15s;
        }

        .umkm-table tbody tr:hover {
            background: var(--gray-light);
        }

        .umkm-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* ─── Status Badge ───────────────────────────────── */
        .umkm-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .umkm-badge--green {
            background: rgba(16, 185, 129, .12);
            color: var(--primary-dark);
        }

        .umkm-badge--yellow {
            background: rgba(245, 158, 11, .12);
            color: #d97706;
        }

        .umkm-badge--red {
            background: rgba(239, 68, 68, .12);
            color: var(--danger);
        }

        /* ─── Currency ───────────────────────────────────── */
        .umkm-currency {
            font-weight: 600;
            color: var(--primary-dark);
        }

        /* ─── Empty State ────────────────────────────────── */
        .umkm-empty {
            text-align: center;
            padding: 56px 24px;
            color: var(--gray-text);
        }

        .umkm-empty__icon {
            font-size: 44px;
            margin-bottom: 14px;
        }

        .umkm-empty h3 {
            font-size: 17px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 6px;
        }

        /* ─── Filter Bar ─────────────────────────────────── */
        .umkm-filter {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 20px 24px;
            box-shadow: var(--shadow-md);
            margin-bottom: 24px;
        }

        .umkm-filter__row {
            display: flex;
            gap: 12px;
            align-items: flex-end;
            flex-wrap: wrap;
        }

        .umkm-filter__item {
            display: flex;
            flex-direction: column;
            gap: 5px;
            flex: 1 1 160px;
        }

        /* ─── Alert ──────────────────────────────────────── */
        .umkm-alert {
            padding: 14px 18px;
            border-radius: var(--radius-md);
            font-size: 13px;
            margin-bottom: 20px;
        }

        .umkm-alert--info {
            background: rgba(16, 185, 129, .1);
            color: var(--primary-dark);
            border: 1px solid var(--primary-light);
        }

        .umkm-alert--warning {
            background: rgba(245, 158, 11, .1);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, .3);
        }

        /* ─── Modal Overlay ──────────────────────────────── */
        .umkm-modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .45);
            z-index: 9000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .umkm-modal-overlay.open {
            display: flex;
        }

        .umkm-modal {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 28px;
            width: 100%;
            max-width: 500px;
            box-shadow: var(--shadow-lg);
            max-height: 90vh;
            overflow-y: auto;
        }

        .umkm-modal__title {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        /* ─── File Upload ────────────────────────────────── */
        .umkm-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 28px 16px;
            border: 2px dashed var(--gray-medium);
            border-radius: var(--radius-md);
            background: var(--gray-light);
            cursor: pointer;
            transition: border-color .2s, background .2s;
            text-align: center;
        }

        .umkm-upload-label:hover {
            border-color: var(--primary);
            background: rgba(16, 185, 129, .04);
        }

        /* ─── Settings Tabs ──────────────────────────────── */
        .umkm-settings {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 28px;
            align-items: start;
        }

        .umkm-settings__menu {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .umkm-settings__tab {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 16px;
            border-radius: var(--radius-md);
            border: 1.5px solid var(--gray-medium);
            background: var(--white);
            color: var(--dark);
            font-size: 14px;
            font-weight: 500;
            font-family: inherit;
            cursor: pointer;
            text-decoration: none;
            transition: background .2s, transform .15s;
            box-shadow: var(--shadow-sm);
        }

        .umkm-settings__tab:hover {
            background: var(--gray-light);
            transform: translateX(3px);
        }

        .umkm-settings__tab.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            border-color: var(--primary);
        }

        .umkm-settings__panel {
            display: none;
        }

        .umkm-settings__panel.active {
            display: block;
        }

        /* ─── Chart Wrapper ──────────────────────────────── */
        .umkm-chart-wrap {
            position: relative;
            height: 280px;
        }

        /* ─── Divider ────────────────────────────────────── */
        .umkm-divider {
            border: none;
            border-top: 1px solid var(--gray-medium);
            margin: 24px 0;
        }

        /* ─── Fade-in animation ──────────────────────────── */
        @keyframes umkmFadeUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .umkm-fade {
            animation: umkmFadeUp .5s ease-out both;
        }

        .umkm-fade--1 {
            animation-delay: .05s;
        }

        .umkm-fade--2 {
            animation-delay: .1s;
        }

        .umkm-fade--3 {
            animation-delay: .15s;
        }

        .umkm-fade--4 {
            animation-delay: .2s;
        }

        /* ─── Responsive Overrides ───────────────────────── */
        @media (max-width: 640px) {
            .umkm-layout {
                padding: 16px 14px 40px;
            }

            .umkm-card__body {
                padding: 20px 16px;
            }

            .umkm-form-row {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .umkm-form-actions {
                flex-direction: column;
            }

            .umkm-btn {
                width: 100%;
            }

            .umkm-settings {
                grid-template-columns: 1fr;
            }

            .umkm-settings__menu {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .umkm-settings__tab {
                flex: 1 1 auto;
                justify-content: center;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="umkm-layout">

        {{-- ── Navbar ─────────────────────────────────────────── --}}
        <nav class="umkm-navbar umkm-fade umkm-fade--1">
            <div class="umkm-navbar__inner">
                <a href="{{ route('umkm.dashboard') }}" 
                class="umkm-navbar__btn {{ request()->routeIs('umkm.dashboard') ? 'active' : '' }}">
                📊 Dashboard
                </a>
                <a href="{{ route('my-products') }}"
                    class="umkm-navbar__btn {{ request()->routeIs('my-products*') ? 'active' : '' }}">
                    📦 Produk
                </a>
                <a href="{{ route('orders') }}"
                    class="umkm-navbar__btn {{ request()->routeIs('orders*') ? 'active' : '' }}">
                    📋 Pesanan
                </a>
                <a href="{{ route('reports') }}"
                    class="umkm-navbar__btn {{ request()->routeIs('reports*') ? 'active' : '' }}">
                    📈 Laporan
                </a>
                <a href="{{ route('settings.index') }}"
                    class="umkm-navbar__btn {{ request()->routeIs('settings*') ? 'active' : '' }}">
                    ⚙️ Pengaturan
                </a>
            </div>
        </nav>

        {{-- ── Page Content ────────────────────────────────────── --}}
        @yield('content')

    </div>
    @stack('scripts')
</body>

</html>