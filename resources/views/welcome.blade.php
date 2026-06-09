<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CipaMilk – Sentra Susu Segar Cipageran</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --dark: #1a1710;
            --white: #ffffff;
            --accent: #c9963f;
            --clay: #b5824a;
            --green: #2e4a24;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--dark);
            color: var(--white);
            overflow-x: hidden;
        }

        /* ─── TOP BAR ─── */
        .topbar {
            background: var(--dark);
            border-bottom: 1px solid rgba(255, 255, 255, .07);
            padding: 8px 48px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: rgba(255, 255, 255, .5);
            letter-spacing: .04em;
        }

        .topbar a {
            color: inherit;
            text-decoration: none;
        }

        .topbar a:hover {
            color: var(--accent);
        }

        .topbar-left {
            display: flex;
            gap: 24px;
        }

        .topbar-right {
            display: flex;
            gap: 20px;
        }

        /* ─── NAVBAR ─── */
        nav {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(26, 23, 16, .92);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, .06);
            padding: 0 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }

        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 26px;
            font-weight: 600;
            letter-spacing: .12em;
            color: var(--white);
            text-decoration: none;
        }

        .logo span {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            gap: 36px;
            list-style: none;
        }

        .nav-links a {
            font-size: 13px;
            font-weight: 500;
            letter-spacing: .07em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .65);
            text-decoration: none;
            position: relative;
            transition: color .25s;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--accent);
            transition: width .3s;
        }

        .nav-links a:hover {
            color: var(--white);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .nav-cart {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: rgba(255, 255, 255, .65);
            text-decoration: none;
            transition: color .25s;
        }

        .nav-cart:hover {
            color: var(--accent);
        }

        /* ─── HAMBURGER ─── */
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px 4px;
        }

        .hamburger span {
            display: block;
            width: 22px;
            height: 2px;
            background: rgba(255, 255, 255, .75);
            border-radius: 2px;
            transition: all .25s;
        }

        /* ─── MOBILE MENU ─── */
        .mobile-menu {
            display: none;
            flex-direction: column;
            background: rgba(26, 23, 16, .98);
            border-bottom: 1px solid rgba(255, 255, 255, .07);
            padding: 8px 24px 20px;
            position: sticky;
            top: 64px;
            z-index: 99;
        }

        .mobile-menu.open {
            display: flex;
        }

        .mobile-menu a {
            padding: 13px 4px;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: .07em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .65);
            text-decoration: none;
            border-bottom: 1px solid rgba(255, 255, 255, .06);
            transition: color .2s;
        }

        .mobile-menu a:hover {
            color: var(--white);
        }

        .mobile-menu .mobile-masuk {
            margin-top: 12px;
            padding: 12px 20px;
            border: 1px solid rgba(201, 150, 63, .4) !important;
            border-radius: 4px;
            text-align: center;
            color: var(--accent) !important;
            border-bottom: 1px solid rgba(201, 150, 63, .4) !important;
        }

        /* ─── HERO ─── */
        .hero {
            position: relative;
            height: 92vh;
            min-height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-slide::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(26, 23, 16, .2) 0%, rgba(26, 23, 16, .5) 60%, rgba(26, 23, 16, .82) 100%);
        }

        .hero-slide:nth-child(1) {
            background-image: url('https://images.unsplash.com/photo-1628088062854-d1870b4553da?w=1600&q=80');
        }

        .hero-slide:nth-child(2) {
            background-image: url('https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=1600&q=80');
        }

        .hero-slide:nth-child(3) {
            background-image: url('https://images.unsplash.com/photo-1550583724-b2692b85b150?w=1600&q=80');
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 780px;
            padding: 0 24px;
            animation: fadeUp .9s .2s both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-eyebrow {
            display: inline-block;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--accent);
            border: 1px solid rgba(201, 150, 63, .4);
            padding: 6px 18px;
            border-radius: 20px;
            margin-bottom: 28px;
        }

        .hero h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(42px, 6vw, 80px);
            font-weight: 600;
            line-height: 1.1;
            color: var(--white);
            margin-bottom: 22px;
        }

        .hero h1 em {
            font-style: normal;
            color: var(--accent);
        }

        .hero p {
            font-size: 16px;
            font-weight: 300;
            line-height: 1.7;
            color: rgba(255, 255, 255, .72);
            max-width: 540px;
            margin: 0 auto 38px;
        }

        .btn-group {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-block;
            padding: 14px 36px;
            background: var(--accent);
            color: var(--dark);
            font-size: 13px;
            font-weight: 500;
            letter-spacing: .08em;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 4px;
            transition: background .25s, transform .2s;
        }

        .btn-primary:hover {
            background: #daa84e;
            transform: translateY(-2px);
        }

        .btn-outline {
            display: inline-block;
            padding: 14px 36px;
            border: 1px solid rgba(255, 255, 255, .35);
            color: var(--white);
            font-size: 13px;
            font-weight: 500;
            letter-spacing: .08em;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 4px;
            transition: border-color .25s, background .25s, transform .2s;
        }

        .btn-outline:hover {
            border-color: var(--accent);
            background: rgba(201, 150, 63, .08);
            transform: translateY(-2px);
        }

        /* ─── DOTS ─── */
        .hero-dots {
            position: absolute;
            bottom: 80px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            display: flex;
            gap: 8px;
        }

        .hero-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .3);
            border: none;
            cursor: pointer;
            padding: 0;
            transition: background .3s, transform .3s;
        }

        .hero-dot.active {
            background: var(--accent);
            transform: scale(1.3);
        }

        /* ─── STATS STRIP ─── */
        .stats {
            background: var(--green);
            padding: 28px 48px;
            display: flex;
            justify-content: center;
            gap: 64px;
            flex-wrap: wrap;
        }

        .stat {
            text-align: center;
        }

        .stat-num {
            font-family: 'Cormorant Garamond', serif;
            font-size: 50px;
            font-weight: 700;
            color: var(--white);
            line-height: 1;
        }

        .stat-label {
            font-size: 11px;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .75);
            margin-top: 4px;
        }

        /* ─── SECTION COMMONS ─── */
        section {
            padding: 96px 48px;
        }

        .section-label {
            font-size: 11px;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 14px;
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(32px, 4vw, 52px);
            font-weight: 600;
            line-height: 1.15;
            color: var(--white);
            margin-bottom: 16px;
        }

        .section-sub {
            font-size: 15px;
            font-weight: 300;
            line-height: 1.7;
            color: rgba(255, 255, 255, .55);
            max-width: 520px;
        }

        /* ─── PRODUK ─── */
        .products {
            background: #201e18;
        }

        .products-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 52px;
            flex-wrap: wrap;
            gap: 24px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .product-card {
            background: #2a2720;
            border: 1px solid rgba(255, 255, 255, .06);
            border-radius: 8px;
            overflow: hidden;
            transition: transform .3s, box-shadow .3s;
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 48px rgba(0, 0, 0, .45);
        }

        .product-img {
            width: 100%;
            aspect-ratio: 4/3;
            object-fit: cover;
            display: block;
        }

        .product-body {
            padding: 22px 24px 26px;
        }

        .product-tag {
            display: inline-block;
            font-size: 10px;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--accent);
            background: rgba(201, 150, 63, .12);
            padding: 4px 10px;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        .product-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 600;
            color: var(--white);
            margin-bottom: 10px;
        }

        .product-desc {
            font-size: 13px;
            font-weight: 300;
            line-height: 1.6;
            color: rgba(255, 255, 255, .5);
            margin-bottom: 18px;
        }

        .product-price {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            font-weight: 600;
            color: var(--accent);
        }

        /* ─── KEUNGGULAN ─── */
        .keunggulan {
            background: var(--dark);
        }

        .keunggulan-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 32px;
            margin-top: 56px;
        }

        .keunggulan-item {
            position: relative;
        }

        .keunggulan-icon {
            font-size: 36px;
            margin-bottom: 16px;
            line-height: 1;
        }

        .keunggulan-title {
            font-size: 16px;
            font-weight: 500;
            color: var(--white);
            margin-bottom: 10px;
        }

        .keunggulan-text {
            font-size: 14px;
            font-weight: 300;
            line-height: 1.65;
            color: rgba(255, 255, 255, .5);
        }

        .keunggulan-item::after {
            content: '';
            position: absolute;
            top: 18px;
            right: -16px;
            width: 1px;
            height: 48px;
            background: rgba(201, 150, 63, .2);
        }

        .keunggulan-item:last-child::after {
            display: none;
        }

        /* ─── CARA PESAN ─── */
        .cara-pesan {
            background: #201e18;
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 32px;
            margin-top: 56px;
        }

        .step {
            position: relative;
        }

        .step-num {
            font-family: 'Cormorant Garamond', serif;
            font-size: 72px;
            font-weight: 700;
            color: rgba(201, 150, 63, .12);
            line-height: 1;
            margin-bottom: 16px;
        }

        .step-title {
            font-size: 16px;
            font-weight: 500;
            color: var(--white);
            margin-bottom: 10px;
        }

        .step-text {
            font-size: 14px;
            font-weight: 300;
            line-height: 1.65;
            color: rgba(255, 255, 255, .5);
        }

        .step::after {
            content: '';
            position: absolute;
            top: 36px;
            right: -16px;
            width: 1px;
            height: 48px;
            background: rgba(201, 150, 63, .2);
        }

        .step:last-child::after {
            display: none;
        }

        /* ─── GALLERY ─── */
        .gallery {
            background: var(--dark);
        }

        .gallery-grid {
            margin-top: 52px;
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            grid-template-rows: 220px 220px;
            gap: 12px;
        }

        .gallery-item {
            border-radius: 6px;
            overflow: hidden;
            background: #3a3530;
            position: relative;
        }

        .gallery-item::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(26, 23, 16, 0);
            transition: background .3s;
        }

        .gallery-item:hover::after {
            background: rgba(26, 23, 16, .35);
        }

        .gallery-item:nth-child(1) {
            grid-column: span 5;
        }

        .gallery-item:nth-child(2) {
            grid-column: span 4;
        }

        .gallery-item:nth-child(3) {
            grid-column: span 3;
        }

        .gallery-item:nth-child(4) {
            grid-column: span 3;
        }

        .gallery-item:nth-child(5) {
            grid-column: span 5;
        }

        .gallery-item:nth-child(6) {
            grid-column: span 4;
        }

        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .4s;
        }

        .gallery-item:hover .gallery-img {
            transform: scale(1.04);
        }

        /* ─── TESTIMONIAL ─── */
        .testimonial {
            background: var(--clay);
            text-align: center;
            padding: 80px 48px;
        }

        .quote-mark {
            font-family: 'Cormorant Garamond', serif;
            font-size: 96px;
            line-height: .6;
            color: rgba(255, 255, 255, .2);
            margin-bottom: 28px;
        }

        .quote-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(22px, 3vw, 34px);
            font-weight: 400;
            font-style: italic;
            line-height: 1.45;
            color: var(--white);
            max-width: 720px;
            margin: 0 auto 28px;
        }

        .quote-author {
            font-size: 13px;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .7);
        }

        /* ─── CTA BANNER ─── */
        .cta-banner {
            background: var(--green);
            border-top: 1px solid rgba(255, 255, 255, .06);
            border-bottom: 1px solid rgba(255, 255, 255, .06);
            padding: 80px 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 48px;
            flex-wrap: wrap;
        }

        .cta-banner .section-title {
            margin-bottom: 8px;
        }

        .cta-banner .section-sub {
            margin-bottom: 0;
        }

        /* ─── FOOTER ─── */
        footer {
            background: #0f0e0b;
            padding: 64px 48px 32px;
        }

        .footer-top {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 48px;
            margin-bottom: 52px;
            padding-bottom: 52px;
            border-bottom: 1px solid rgba(255, 255, 255, .07);
        }

        .footer-brand .logo {
            display: block;
            margin-bottom: 16px;
            font-size: 28px;
        }

        .footer-brand p {
            font-size: 13px;
            font-weight: 300;
            line-height: 1.7;
            color: rgba(255, 255, 255, .45);
            margin-bottom: 24px;
        }

        .footer-socials {
            display: flex;
            gap: 14px;
        }

        .footer-socials a {
            width: 36px;
            height: 36px;
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, .5);
            text-decoration: none;
            font-size: 13px;
            transition: border-color .25s, color .25s;
        }

        .footer-socials a:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        .footer-col h4 {
            font-size: 11px;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: var(--white);
            margin-bottom: 20px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 10px;
        }

        .footer-col ul a {
            font-size: 13px;
            font-weight: 300;
            color: rgba(255, 255, 255, .45);
            text-decoration: none;
            transition: color .25s;
        }

        .footer-col ul a:hover {
            color: var(--accent);
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: rgba(255, 255, 255, .25);
            flex-wrap: wrap;
            gap: 12px;
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 1024px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .steps {
                grid-template-columns: repeat(2, 1fr);
            }

            .keunggulan-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-top {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {

            nav,
            .topbar,
            section,
            footer {
                padding-left: 24px;
                padding-right: 24px;
            }

            nav {
                padding: 0 20px;
            }

            .stats {
                gap: 32px;
                padding: 24px;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }

            .steps {
                grid-template-columns: 1fr;
            }

            .keunggulan-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                display: flex;
                flex-wrap: wrap;
            }

            .gallery-item {
                flex: 1 1 calc(50% - 6px);
                height: 160px;
            }

            .footer-top {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .nav-links {
                display: none;
            }

            .nav-cart {
                display: none;
            }

            .hamburger {
                display: flex;
            }

            .cta-banner {
                text-align: center;
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <!-- TOP BAR -->
    <div class="topbar">
        <div class="topbar-left">
            <a href="mailto:info@cipamilk.id">✉ info@cipamilk.id</a>
            <a href="tel:+6222123456">☎ +62 22 1234-56</a>
        </div>
        <div class="topbar-right">
            <a href="#">f</a>
            <a href="#">ig</a>
            <a href="#">wa</a>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav>
        <a href="#" class="logo">CIPA<span>M</span>ILK</a>
        <ul class="nav-links">
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">Galeri</a></li>
            <li><a href="#">Ulasan</a></li>
            <li><a href="#">Kontak</a></li>
        </ul>
        <div class="nav-right">

            @auth

            @if(Auth::user()->role === 'super_admin')
            <a href="{{ route('admin.products.pending') }}" class="nav-cart">
                Dashboard
            </a>
            @else
            <a href="{{ route('dashboard') }}" class="nav-cart">
                Dashboard
            </a>
            @endif

            @else

            <a href="{{ route('login') }}" class="nav-cart">
                Masuk
            </a>

            @endauth

            <button class="hamburger" id="hamburger">
                <span id="hb1"></span>
                <span id="hb2"></span>
                <span id="hb3"></span>
            </button>

        </div>
    </nav>

    <!-- MOBILE MENU -->
    <div class="mobile-menu" id="mobile-menu">
        <a href="#">Tentang Kami</a>
        <a href="#">Galeri</a>
        <a href="#">Ulasan</a>
        <a href="#">Kontak</a>

        @auth

        @if(Auth::user()->role === 'super_admin')
        <a href="{{ route('admin.products.pending') }}" class="mobile-masuk">
            Dashboard
        </a>
        @else
        <a href="{{ route('dashboard') }}" class="mobile-masuk">
            Dashboard
        </a>
        @endif

        @else

        <a href="{{ route('login') }}" class="mobile-masuk">
            Masuk
        </a>

        @endauth

    </div>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-slide active"></div>
        <div class="hero-slide"></div>
        <div class="hero-slide"></div>

        <div class="hero-content">
            <span class="hero-eyebrow">Sentra Susu Cipageran, Cimahi</span>
            <h1>Susu segar langsung<br><em>dari peternak lokal.</em></h1>
            <p>Produk olahan susu berkualitas tinggi dari peternak Cipageran — segar, alami, dan diproduksi secara berkelanjutan sejak 2014.</p>
            <div class="btn-group">
                <a href="{{ route('landing') }}" class="btn-primary">Lihat Produk</a>
                <a href="#" class="btn-outline">Lokasi Kami</a>
            </div>
        </div>

        <div class="hero-dots">
            <button class="hero-dot active" onclick="goSlide(0)"></button>
            <button class="hero-dot" onclick="goSlide(1)"></button>
            <button class="hero-dot" onclick="goSlide(2)"></button>
        </div>
    </section>

    <script>
        // Hero slider
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.hero-dot');
        let current = 0,
            timer;

        function goSlide(n) {
            slides[current].classList.remove('active');
            dots[current].classList.remove('active');
            current = n;
            slides[current].classList.add('active');
            dots[current].classList.add('active');
            clearInterval(timer);
            timer = setInterval(nextSlide, 5000);
        }

        function nextSlide() {
            goSlide((current + 1) % slides.length);
        }
        timer = setInterval(nextSlide, 5000);

        // Hamburger menu
        const hbBtn = document.getElementById('hamburger');
        const mMenu = document.getElementById('mobile-menu');
        const s1 = document.getElementById('hb1');
        const s2 = document.getElementById('hb2');
        const s3 = document.getElementById('hb3');
        let menuOpen = false;
        hbBtn.addEventListener('click', () => {
            menuOpen = !menuOpen;
            mMenu.classList.toggle('open', menuOpen);
            hbBtn.setAttribute('aria-expanded', menuOpen);
            s1.style.transform = menuOpen ? 'rotate(45deg) translate(5px, 5px)' : '';
            s2.style.opacity = menuOpen ? '0' : '';
            s3.style.transform = menuOpen ? 'rotate(-45deg) translate(5px, -5px)' : '';
        });

        // Tutup menu kalau klik link
        mMenu.querySelectorAll('a').forEach(a => {
            a.addEventListener('click', () => {
                menuOpen = false;
                mMenu.classList.remove('open');
                hbBtn.setAttribute('aria-expanded', false);
                s1.style.transform = '';
                s2.style.opacity = '';
                s3.style.transform = '';
            });
        });
    </script>

    <!-- STATS -->
    <div class="stats">
        <div class="stat">
            <div class="stat-num">80+</div>
            <div class="stat-label">Peternak Mitra</div>
        </div>
        <div class="stat">
            <div class="stat-num">20+</div>
            <div class="stat-label">UMKM Cipageran</div>
        </div>
        <div class="stat">
            <div class="stat-num">10+</div>
            <div class="stat-label">Tahun Berpengalaman</div>
        </div>
        <div class="stat">
            <div class="stat-num">10+</div>
            <div class="stat-label">Varian Produk</div>
        </div>
    </div>

    <!-- PRODUK UNGGULAN -->
    <section class="products">
        <div class="products-header">
            <div>
                <div class="section-label">Produk UMKM</div>
                <h2 class="section-title">Olahan Susu<br>Pilihan</h2>
            </div>
            <a href="#" class="btn-outline">Lihat Semua →</a>
        </div>
        <div class="products-grid">
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1563636619-e9143da7973b?w=800&q=75" alt="Susu Segar" class="product-img" loading="lazy">
                <div class="product-body">
                    <span class="product-tag">Unggulan</span>
                    <div class="product-title">Susu Segar Murni</div>
                    <div class="product-desc">Susu segar full cream tanpa tambahan bahan pengawet, langsung dari peternakan Cipageran.</div>
                    <div class="product-price">Rp 8.000 / 250ml</div>
                </div>
            </div>
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1559598467-f8b76c8155d0?w=800&q=75" alt="Yogurt" class="product-img" loading="lazy">
                <div class="product-body">
                    <span class="product-tag">Fermentasi</span>
                    <div class="product-title">Yogurt Cipamilk</div>
                    <div class="product-desc">Yogurt creamy dengan probiotik alami, tersedia rasa original, stroberi, dan mangga.</div>
                    <div class="product-price">Rp 15.000 / 200ml</div>
                </div>
            </div>
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1486297678162-eb2a19b0a32d?w=800&q=75" alt="Keju" class="product-img" loading="lazy">
                <div class="product-body">
                    <span class="product-tag">Premium</span>
                    <div class="product-title">Keju Lokal Segar</div>
                    <div class="product-desc">Keju mozzarella dan cottage cheese buatan tangan dari susu segar peternak Cipageran.</div>
                    <div class="product-price">Rp 35.000 / 200gr</div>
                </div>
            </div>
        </div>
    </section>

    <!-- KEUNGGULAN -->
    <section class="keunggulan">
        <div style="max-width:480px;">
            <div class="section-label">Mengapa Centra Susu Cipageran?</div>
            <h2 class="section-title">Kualitas yang Bisa<br>Kamu Rasakan</h2>
        </div>
        <div class="keunggulan-grid">
            <div class="keunggulan-item">
                <div class="keunggulan-icon">🐄</div>
                <div class="keunggulan-title">Langsung dari Peternak</div>
                <p class="keunggulan-text">Kami bermitra langsung dengan 50+ peternak sapi perah lokal Cipageran tanpa perantara.</p>
            </div>
            <div class="keunggulan-item">
                <div class="keunggulan-icon">🧪</div>
                <div class="keunggulan-title">Diuji Setiap Hari</div>
                <p class="keunggulan-text">Setiap batch diuji kualitas dan kebersihannya sebelum dikemas dan dikirim ke konsumen.</p>
            </div>
            <div class="keunggulan-item">
                <div class="keunggulan-icon">🌿</div>
                <div class="keunggulan-title">Tanpa Pengawet</div>
                <p class="keunggulan-text">Produk kami bebas bahan pengawet, pewarna buatan, dan pemanis sintetis.</p>
            </div>
            <div class="keunggulan-item">
                <div class="keunggulan-icon">❄️</div>
                <div class="keunggulan-title">Pengiriman Dingin</div>
                <p class="keunggulan-text">Dikemas dengan cold-chain packaging untuk menjaga kesegaran selama pengiriman.</p>
            </div>
        </div>
    </section>

    <!-- CARA PESAN -->
    <section class="cara-pesan">
        <div style="max-width:480px;">
            <div class="section-label">Cara Pesan</div>
            <h2 class="section-title">Mudah, Cepat,<br>Sampai Segar</h2>
        </div>
        <div class="steps">
            <div class="step">
                <div class="step-num">01</div>
                <div class="step-title">Pilih Produk</div>
                <p class="step-text">Jelajahi koleksi produk susu segar dan olahan kami, lalu tambahkan ke keranjang.</p>
            </div>
            <div class="step">
                <div class="step-num">02</div>
                <div class="step-title">Pesan & Bayar</div>
                <p class="step-text">Lakukan pembayaran via transfer bank, QRIS, atau bayar langsung di toko kami.</p>
            </div>
            <div class="step">
                <div class="step-num">03</div>
                <div class="step-title">Dikemas Segar</div>
                <p class="step-text">Pesanan dikemas dengan cold packaging setiap pagi agar kesegaran tetap terjaga.</p>
            </div>
            <div class="step">
                <div class="step-num">04</div>
                <div class="step-title">Diterima di Rumah</div>
                <p class="step-text">Nikmati susu segar Cipamilk langsung di rumah Anda dalam kondisi terbaik.</p>
            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section class="gallery">
        <div class="section-label">Galeri</div>
        <h2 class="section-title">Dari Ladang<br>ke Meja Makan</h2>
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=800&q=75" alt="Peternakan" class="gallery-img" loading="lazy">
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1628088062854-d1870b4553da?w=800&q=75" alt="Susu Segar" class="gallery-img" loading="lazy">
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1550583724-b2692b85b150?w=800&q=75" alt="Sapi" class="gallery-img" loading="lazy">
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1563636619-e9143da7973b?w=800&q=75" alt="Produk Susu" class="gallery-img" loading="lazy">
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1559598467-f8b76c8155d0?w=800&q=75" alt="Yogurt" class="gallery-img" loading="lazy">
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1486297678162-eb2a19b0a32d?w=800&q=75" alt="Keju" class="gallery-img" loading="lazy">
            </div>
        </div>
    </section>

    <!-- TESTIMONIAL -->
    <div class="testimonial">
        <div class="quote-mark">"</div>
        <p class="quote-text">Susu Cipamilk jadi pilihan keluarga kami setiap hari. Rasanya segar, tidak amis, dan anak-anak suka banget. Beda banget sama susu kemasan biasa.</p>
        <div class="quote-author">— Ibu Dewi Rahayu, Pelanggan Setia · Cimahi, 2024</div>
    </div>

    <!-- CTA BANNER -->
    <div class="cta-banner">
        <div>
            <div class="section-label">Pesan Sekarang</div>
            <h2 class="section-title">Rasakan Bedanya<br>Produk Olahan Susu Lokal.</h2>
            <p class="section-sub">Pesan langsung dari peternak Cipageran. Tersedia untuk pengiriman area Cimahi, Bandung, dan sekitarnya.</p>
        </div>
        <div class="btn-group">
            <a href="#" class="btn-primary">Pesan Sekarang</a>
            <a href="#" class="btn-outline">Hubungi Kami</a>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="footer-top">
            <div class="footer-brand">
                <a href="#" class="logo">CIPA<span>M</span>ILK</a>
                <p>Sentra produk olahan susu segar dari peternak lokal Cipageran, Cimahi. Segar, alami, dan berkelanjutan.</p>
                <div class="footer-socials">
                    <a href="#">f</a>
                    <a href="#">ig</a>
                    <a href="#">wa</a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Produk</h4>
                <ul>
                    <li><a href="#">Susu Segar</a></li>
                    <li><a href="#">Yogurt</a></li>
                    <li><a href="#">Keju Lokal</a></li>
                    <li><a href="#">Susu Pasteurisasi</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Informasi</h4>
                <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Cara Pesan</a></li>
                    <li><a href="#">Galeri</a></li>
                    <li><a href="#">Blog & Resep</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Kontak</h4>
                <ul>
                    <li><a href="mailto:info@cipamilk.id">info@cipamilk.id</a></li>
                    <li><a href="tel:+6222123456">+62 22 1234-56</a></li>
                    <li><a href="#">Cipageran, Cimahi Utara</a></li>
                    <li><a href="#">Jawa Barat, Indonesia</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© 2025 Cipamilk. Hak cipta dilindungi.</span>
            <span>
                <a href="#" style="color:inherit; text-decoration:none; margin-right:20px;">Kebijakan Privasi</a>
                <a href="#" style="color:inherit; text-decoration:none;">Syarat & Ketentuan</a>
            </span>
        </div>
    </footer>

</body>

</html>