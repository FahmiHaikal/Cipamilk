<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Umkm;
use App\Models\Article; // Pastikan Model Article di-import
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CipaMilkSeeder extends Seeder
{
    public function run(): void
    {
        $userUden = \App\Models\User::updateOrCreate(
            ['email' => 'uden@cipamilk.com'],
            [
                'name' => 'Bapak Uden',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'umkm',
            ]
        );

        $sapiMandiri = Umkm::updateOrCreate(
            ['nama_umkm' => 'Sapi Mandiri Cipageran'],
            [
                'user_id' => $userUden->id,
                'pemilik' => 'Bapak Uden',
                'whatsapp' => '6281234567890',
                'alamat' => 'Sentra Susu Cipageran, Kota Cimahi',
                'story' => 'Fokus menyuplai pabrik dan agen besar. Memproduksi susu pasteurisasi, yoghurt botol, dan keju mozarella berkualitas tinggi.',
                'status' => 'approved',
            ]
        );

        $userDini = \App\Models\User::updateOrCreate(
            ['email' => 'dini@cipamilk.com'],
            [
                'name' => 'Ibu Dini',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'umkm',
            ]
        );

        $yoghurtCiyoo = Umkm::updateOrCreate(
            ['nama_umkm' => 'Yoghurt Ciyoo'],
            [
                'user_id' => $userDini->id,
                'pemilik' => 'Ibu Dini',
                'whatsapp' => '6289876543210',
                'alamat' => 'Sentra Susu Cipageran, Kota Cimahi',
                'story' => 'Menjual yoghurt dan es lilin yoghurt kesukaan anak-anak. Pemasaran difokuskan di area terdekat, warung, dan sekolah.',
                'status' => 'approved',
            ]
        );

        $userEsih = \App\Models\User::updateOrCreate(
            ['email' => 'esih@cipamilk.com'],
            [
                'name' => 'Ibu Esih',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'umkm',
            ]
        );

        $yoeriCookies = Umkm::updateOrCreate(
            ['nama_umkm' => 'Yoeri Cookies'],
            [
                'user_id' => $userEsih->id,
                'pemilik' => 'Ibu Esih',
                'whatsapp' => '6285551234567',
                'alamat' => 'Sentra Susu Cipageran, Kota Cimahi',
                'story' => 'Memproduksi bolu dan pie susu lezat. Sudah memiliki sertifikat Halal resmi.',
                'status' => 'approved',
            ]
        );

        $products = [
            [
                'umkm_id' => $yoghurtCiyoo->id,
                'nama_produk' => 'Yoghurt Botol Ciyo',
                'slug' => 'yoghurt-botol-ciyo',
                'harga' => 8000,
                'kategori' => 'Yoghurt',
                'deskripsi' => 'Yoghurt botol segar dengan berbagai varian rasa buah asli. Cocok untuk pencernaan dan dinikmati dingin.',
                'masa_simpan' => '7 Hari (Kulkas)',
                'label_gizi' => 'Halal, Probiotik Alami',
                'image' => 'products/yoghurt_botol_ciyo_image_products.png', // <-- Sesuai gambar
                'diskon' => 10,
                'rating' => 4.8,
                'terjual' => 150,
            ],
            [
                'umkm_id' => $yoghurtCiyoo->id,
                'nama_produk' => 'Es Lilin Yoghurt',
                'slug' => 'es-lilin-yoghurt',
                'harga' => 3000,
                'kategori' => 'Cemilan',
                'deskripsi' => 'Es lilin jadul berbahan dasar yoghurt sehat, ringan, segar, dan cocok untuk camilan anak-anak.',
                'masa_simpan' => '2 Minggu (Freezer)',
                'label_gizi' => 'Halal, Jajanan Sehat',
                'image' => 'products/es_lilin_yogurth_image_products.png', // <-- Sesuai gambar
                'diskon' => 10,
                'rating' => 4.8,
                'terjual' => 150,
            ],
            [
                'umkm_id' => $sapiMandiri->id,
                'nama_produk' => 'Keju Mozarella Lokal',
                'slug' => 'keju-mozarella-lokal',
                'harga' => 100000,
                'kategori' => 'Keju',
                'deskripsi' => 'Keju mozarella lokal berkualitas ekspor. Teksturnya lumer dan cocok untuk pizza, roti, serta hidangan rumahan.',
                'masa_simpan' => '3 Bulan (Freezer)',
                'label_gizi' => 'Halal, Tinggi Kalsium',
                'image' => 'products/keju_mozarella_lokal_image_products.png', // <-- Sesuai gambar
                'diskon' => 10,
                'rating' => 4.8,
                'terjual' => 150,
            ],
            [
                'umkm_id' => $yoeriCookies->id,
                'nama_produk' => 'Pie Susu Lembang',
                'slug' => 'pie-susu-lembang',
                'harga' => 35000,
                'kategori' => 'Cemilan',
                'deskripsi' => 'Pie susu dengan isian vla susu yang lembut dan kulit pie yang renyah. Praktis untuk oleh-oleh maupun camilan keluarga.',
                'masa_simpan' => '5 Hari (Suhu Ruang)',
                'label_gizi' => 'Sertifikat Halal Resmi',
                'image' => 'products/pie_susu_lembang_image_products.png', // <-- Sesuai gambar
                'diskon' => 10,
                'rating' => 4.8,
                'terjual' => 150,
            ],
            [
                'umkm_id' => $sapiMandiri->id,
                'nama_produk' => 'Susu Pasteurisasi Segar',
                'slug' => 'susu-pasteurisasi-segar',
                'harga' => 15000,
                'kategori' => 'Susu Segar',
                'deskripsi' => 'Susu sapi murni yang dipasteurisasi dengan suhu tepat untuk menjaga nutrisi alami tanpa pengawet.',
                'masa_simpan' => '4 Jam (Suhu Ruang) / 3 Hari (Kulkas)',
                'label_gizi' => 'Halal, Tanpa Pengawet',
                'image' => 'products/susu_pasteurisasi_segar_image_products.png', // <-- Sesuai gambar
                'diskon' => 10,
                'rating' => 4.8,
                'terjual' => 150,
            ],
        ];

        foreach ($products as $product) {
            $product['status'] = 'approved';
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                $product
            );
        }

        $articles = [
            [
                'umkm_id' => $sapiMandiri->id,
                'title' => 'Sapi Mandiri Raih Sertifikasi CHSE',
                'slug' => Str::slug('Sapi Mandiri Raih Sertifikasi CHSE') . '-' . time(),
                'image' => 'articles/sapi_mandiri_chse.jpg',
                'content' => 'Alhamdulillah, berkat pendampingan dari tim KKN, Sapi Mandiri kini telah resmi mengantongi sertifikat CHSE (Cleanliness, Health, Safety, Environment Sustainability). Proses pemerahan susu kami dijamin 100% higienis.',
                'published_at' => now()->subDays(2),
            ],
            [
                'umkm_id' => $yoghurtCiyoo->id,
                'title' => 'Varian Rasa Baru: Mangga Gedong Gincu!',
                'slug' => Str::slug('Varian Rasa Baru Mangga Gedong Gincu') . '-' . time(),
                'image' => 'articles/yoghurt_mangga.jpg',
                'content' => 'Kabar gembira untuk pelanggan setia Yoghurt Ciyoo! Minggu ini kami meluncurkan varian rasa baru menggunakan mangga gedong gincu asli yang segar dan kaya vitamin C.',
                'published_at' => now()->subDays(5),
            ],
            [
                'umkm_id' => $yoeriCookies->id,
                'title' => 'Yoeri Cookies Hadir di Pameran UMKM Jabar',
                'slug' => Str::slug('Yoeri Cookies Hadir di Pameran UMKM Jabar') . '-' . time(),
                'image' => 'articles/yoeri_pameran.jpg',
                'content' => 'Terima kasih kepada pelanggan yang sudah mampir ke booth kami di Pameran UMKM Jawa Barat. Antusiasme terhadap Pie Susu Lembang sangat luar biasa hingga ludes terjual dalam 3 jam pertama.',
                'published_at' => now()->subDays(10),
            ]
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(
                ['title' => $article['title']],
                $article
            );
        }
    }
}