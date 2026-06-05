<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - UMKM</title>
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
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 24px;
        }

        /* Header */
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
        .form-group textarea,
        .form-group select {
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
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* Two Column Layout */
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
        }

        /* File Upload */
        .file-upload-wrapper {
            position: relative;
        }

        .file-upload-input {
            display: none;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 16px;
            border: 2px dashed var(--gray-medium);
            border-radius: 8px;
            background: var(--gray-light);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload-label:hover {
            border-color: var(--primary);
            background: rgba(16, 185, 129, 0.05);
        }

        .file-upload-text {
            text-align: center;
        }

        .file-upload-icon {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .file-upload-text p {
            font-size: 13px;
            color: var(--gray-text);
            margin: 4px 0;
        }

        .file-upload-text .main {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 4px;
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

        .btn-secondary {
            background: var(--gray-light);
            color: var(--dark);
            border: 1.5px solid var(--gray-medium);
        }

        .btn-secondary:hover {
            background: var(--gray-medium);
            border-color: var(--gray-text);
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
        .form-card {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .page-header {
            animation-delay: 0.1s;
        }

        .form-card {
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
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="page-header">
            <h1>Tambah Produk Baru</h1>
            <p>Lengkapi semua detail produk UMKM Anda</p>
        </div>

        <!-- Form Card -->
        <div class="form-card">
            <div class="form-card-header">
                <h2>📦 Informasi Produk</h2>
            </div>

            <form
                method="POST"
                action="{{ route('my-products.store') }}"
                enctype="multipart/form-data"
                class="form-card-body">
                @csrf

                <!-- Foto Produk -->
                <div class="form-group file-upload-wrapper">
                    <label for="foto">Foto Produk</label>
                    <input type="file" id="foto" name="foto" class="file-upload-input" accept="image/*">
                    <label for="foto" class="file-upload-label">
                        <div class="file-upload-text">
                            <div class="file-upload-icon">📸</div>
                            <p class="main">Pilih foto atau drag & drop</p>
                            <p>PNG, JPG, GIF (Max. 5MB)</p>
                        </div>
                    </label>
                </div>

                <!-- Two Column: Nama & Kategori -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk *</label>
                        <input type="text" id="nama_produk" name="nama_produk" placeholder="Contoh: Susu Segar Premium" required>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input
                            type="number"
                            id="harga"
                            name="harga"
                            placeholder="Harga produk"
                            min="0"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori *</label>
                        <select id="kategori" name="kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Susu">Susu & Dairy</option>
                            <option value="Kue">Kue & Pastry</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Makanan Ringan">Makanan Ringan</option>
                            <option value="Kerajinan">Kerajinan</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <!-- Label/Tag -->
                <div class="form-group">
                    <label for="label">Label/Tag</label>
                    <input type="text" id="label" name="label" placeholder="Contoh: Organik, Halal, Promo, Terbaru">
                </div>

                <!-- Deskripsi -->
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Produk</label>
                    <textarea id="deskripsi" name="deskripsi" placeholder="Jelaskan detail produk, bahan, manfaat, dan cara penggunaan..."></textarea>
                </div>

                <!-- Two Column: Stock & Diskon -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="stock">Stock *</label>
                        <input type="number" id="stock" name="stock" placeholder="Jumlah stok awal" min="0" required>
                    </div>

                    <div class="form-group">
                        <label for="discount_price">Diskon (%)</label>
                        <input type="number" id="discount_price" name="discount_price" placeholder="0 - 100" min="0" max="100">
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        ✓ Simpan Produk
                    </button>
                    <a href="{{ route('my-products') }}" class="btn btn-secondary">
                        ✕ Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>