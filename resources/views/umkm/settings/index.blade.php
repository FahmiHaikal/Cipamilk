<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - UMKM Dashboard</title>
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

        /* Settings Container */
        .settings-container {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 32px;
        }

        /* Tabs Menu */
        .settings-menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .settings-tab {
            padding: 14px 18px;
            border-radius: 8px;
            background: var(--white);
            color: var(--dark);
            border: 1px solid var(--gray-medium);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: var(--shadow-sm);
        }

        .settings-tab:hover {
            background: var(--gray-light);
            border-color: var(--gray-text);
            transform: translateX(4px);
        }

        .settings-tab.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            border-color: var(--primary);
        }

        /* Form Content */
        .settings-content {
            display: none;
        }

        .settings-content.active {
            display: block;
        }

        /* Form Card */
        .form-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }

        .form-card-header {
            padding: 24px;
            background: linear-gradient(135deg, #f9fafb, #f3f4f6);
            border-bottom: 1px solid var(--gray-medium);
        }

        .form-card-header h2 {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .form-card-header p {
            font-size: 13px;
            color: var(--gray-text);
        }

        .form-card-body {
            padding: 32px;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 24px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid var(--gray-medium);
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            color: var(--dark);
            transition: all 0.3s ease;
            background: var(--white);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Form Row (2 columns) */
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
        }

        .form-row .form-group {
            margin-bottom: 0;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--gray-medium);
        }

        .btn {
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }

        /* Alert/Info Messages */
        .alert {
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 14px;
        }

        .alert-info {
            background: rgba(16, 185, 129, 0.1);
            color: var(--primary-dark);
            border: 1px solid var(--primary-light);
        }

        .alert-warning {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.3);
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
        .settings-container {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .page-header {
            animation-delay: 0.1s;
        }

        .settings-container {
            animation-delay: 0.15s;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 20px 16px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .settings-container {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .settings-menu {
                flex-direction: row;
                flex-wrap: wrap;
                gap: 8px;
            }

            .settings-tab {
                flex: 1;
                justify-content: center;
            }

            .form-card-body {
                padding: 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .form-actions {
                flex-direction: column;
                gap: 8px;
                margin-top: 24px;
            }

            .btn {
                width: 100%;
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
    </style>
</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <div class="dashboard-navbar">
            <a href="#" class="navbar-btn">📊 Dashboard</a>
            <a href="#" class="navbar-btn">📦 Produk</a>
            <a href="#" class="navbar-btn">📋 Pesanan</a>
            <a href="#" class="navbar-btn">📈 Laporan</a>
            <a href="#" class="navbar-btn active">⚙️ Pengaturan</a>
        </div>

        <!-- Header -->
        <div class="page-header">
            <h1>Pengaturan</h1>
            <p>Kelola profil dan preferensi akun UMKM Anda</p>
        </div>

        <!-- Settings Container -->
        <div class="settings-container">
            <!-- Menu Tabs -->
            <div class="settings-menu">
                <button class="settings-tab active" onclick="switchTab('profil')">
                    🏢 Profil UMKM
                </button>
                <button class="settings-tab" onclick="switchTab('akun')">
                    👤 Akun
                </button>
            </div>

            <!-- Content -->
            <div class="settings-content-wrapper">
                <!-- Profil UMKM Tab -->
                <div id="profil" class="settings-content active">
                    <div class="form-card">
                        <div class="form-card-header">
                            <h2>🏢 Profil UMKM</h2>
                            <p>Perbarui informasi profil bisnis Anda</p>
                        </div>

                        <form method="POST" action="{{ route('settings.profile') }}" class="form-card-body">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="nama_umkm">Nama UMKM *</label>
                                    <input 
                                        type="text" 
                                        id="nama_umkm" 
                                        name="nama_umkm"
                                        value="{{ $umkm->nama_umkm }}"
                                        placeholder="Contoh: UMKM Cipageran Jaya"
                                        required
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="pemilik">Nama Pemilik *</label>
                                    <input 
                                        type="text" 
                                        id="pemilik" 
                                        name="pemilik"
                                        value="{{ $umkm->pemilik }}"
                                        placeholder="Contoh: Budi Santoso"
                                        required
                                    >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="whatsapp">Nomor WhatsApp *</label>
                                <input 
                                    type="text" 
                                    id="whatsapp" 
                                    name="whatsapp"
                                    value="{{ $umkm->whatsapp }}"
                                    placeholder="Contoh: 62812345678"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat Lengkap</label>
                                <textarea 
                                    id="alamat" 
                                    name="alamat"
                                    placeholder="Masukkan alamat lengkap UMKM Anda..."
                                >{{ $umkm->alamat }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="story">Cerita UMKM Anda</label>
                                <textarea 
                                    id="story" 
                                    name="story"
                                    placeholder="Ceritakan kisah, visi, dan misi UMKM Anda..."
                                >{{ $umkm->story }}</textarea>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    💾 Simpan Profil
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Akun Tab -->
                <div id="akun" class="settings-content">
                    <div class="form-card">
                        <div class="form-card-header">
                            <h2>👤 Akun</h2>
                            <p>Perbarui informasi dan keamanan akun Anda</p>
                        </div>

                        <form method="POST" action="{{ route('settings.account') }}" class="form-card-body">
                            @csrf
                            @method('PUT')

                            <div class="alert alert-info">
                                ℹ️ Informasi akun login Anda
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap *</label>
                                    <input 
                                        type="text" 
                                        id="name" 
                                        name="name"
                                        value="{{ auth()->user()->name }}"
                                        placeholder="Contoh: Budi Santoso"
                                        required
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input 
                                        type="email" 
                                        id="email" 
                                        name="email"
                                        value="{{ auth()->user()->email }}"
                                        placeholder="Contoh: budi@email.com"
                                        required
                                    >
                                </div>
                            </div>

                            <hr style="border: none; border-top: 1px solid var(--gray-medium); margin: 32px 0;">

                            <div style="margin-bottom: 24px;">
                                <p style="font-weight: 600; color: var(--dark); margin-bottom: 16px;">🔒 Ubah Password</p>
                                <p style="font-size: 13px; color: var(--gray-text); margin-bottom: 16px;">Kosongkan jika tidak ingin mengubah password</p>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="password">Password Baru</label>
                                    <input 
                                        type="password" 
                                        id="password" 
                                        name="password"
                                        placeholder="Masukkan password baru (minimal 8 karakter)"
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input 
                                        type="password" 
                                        id="password_confirmation" 
                                        name="password_confirmation"
                                        placeholder="Ulangi password baru"
                                    >
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    💾 Update Akun
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tabName) {
            // Hide all contents
            document.querySelectorAll('.settings-content').forEach(content => {
                content.classList.remove('active');
            });

            // Remove active from all tabs
            document.querySelectorAll('.settings-tab').forEach(tab => {
                tab.classList.remove('active');
            });

            // Show selected content
            document.getElementById(tabName).classList.add('active');

            // Set active tab
            event.target.classList.add('active');
        }
    </script>
</body>
</html>