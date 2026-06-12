<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran UMKM Ditinjau - Cipamilk</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 50%, #f0fdf4 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            color: #1e293b;
        }

        .card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 24px;
            padding: 40px;
            max-width: 540px;
            width: 100%;
            text-align: center;
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.08);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .icon-wrapper {
            width: 96px;
            height: 96px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 28px;
            box-shadow: 0 10px 20px -5px rgba(16, 185, 129, 0.4);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(16, 185, 129, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        .icon {
            font-size: 44px;
            color: #ffffff;
        }

        h1 {
            font-size: 26px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        p.subtitle {
            font-size: 15px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .details-box {
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 16px;
            padding: 16px 20px;
            text-align: left;
            margin-bottom: 32px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .detail-row:last-child {
            margin-bottom: 0;
        }

        .detail-label {
            color: #64748b;
            font-weight: 500;
        }

        .detail-value {
            color: #334155;
            font-weight: 600;
        }

        .badge {
            background: #fef3c7;
            color: #d97706;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .button-group {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
        }

        .btn-primary {
            background: #ffffff;
            color: #0f172a;
            border: 1.5px solid #cbd5e1;
            box-shadow: 0 1px 2px 0 rgba(0,0,0,0.05);
        }

        .btn-primary:hover {
            background: #f8fafc;
            border-color: #94a3b8;
            transform: translateY(-1px);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: #ffffff;
            box-shadow: 0 4px 6px -1px rgba(239, 68, 68, 0.2);
        }

        .btn-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(239, 68, 68, 0.3);
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon-wrapper">
            <span class="icon">⏱</span>
        </div>
        <h1>Menunggu Persetujuan Admin</h1>
        <p class="subtitle">
            Terima kasih telah mendaftar sebagai mitra UMKM Cipamilk. Saat ini tim admin kami sedang memverifikasi profil toko Anda. Anda akan menerima akses penuh setelah proses ini selesai.
        </p>

        <div class="details-box">
            <div class="detail-row">
                <span class="detail-label">Nama Pemilik</span>
                <span class="detail-value">{{ Auth::user()->name }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Nama Toko</span>
                <span class="detail-value">{{ Auth::user()->umkm?->nama_umkm ?? '-' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Status Akun</span>
                <span class="badge">Pending</span>
            </div>
        </div>

        <div class="button-group">
            <a href="/" class="btn btn-primary">Kembali ke Home</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">🚪 Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
