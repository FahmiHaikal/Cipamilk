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
                'nama_produk' => 'ES LILIN CIYOO',
                'slug' => 'yoghurt-botol-ciyo',
                'harga' => 8000,
                'kategori' => 'Yoghurt',
                'deskripsi' => 'Yoghurt botol segar dengan berbagai varian rasa buah asli. Cocok untuk pencernaan dan dinikmati dingin.',
                'masa_simpan' => '7 Hari (Kulkas)',
                'label_gizi' => 'Halal, Probiotik Alami',
                'image' => 'products/P1.png', // <-- Sesuai gambar
                'diskon' => 10,
                'rating' => 4.8,
                'terjual' => 150,
            ],
            [
                'umkm_id' => $sapiMandiri->id,
                'nama_produk' => 'Kerupuk Susu',
                'slug' => 'kerupuk-susu',
                'harga' => 10000,
                'kategori' => 'Kerupuk',
                'deskripsi' => 'Cemilan Kerupuk yang terbuat dari susu, cocok menjadi pendamping lauk biar bisa kriuk-kriuk.',
                'masa_simpan' => '3 Bulan (Suhu ruang)',
                'label_gizi' => 'Halal, Tinggi Kalsium',
                'image' => 'products/P4.png', 
                'diskon' => 10,
                'rating' => 4.8,
                'terjual' => 150,
            ],
            [
                'umkm_id' => $yoeriCookies->id,
                'nama_produk' => 'Pie Susu Yoorie',
                'slug' => 'pie-susu-lembang',
                'harga' => 35000,
                'kategori' => 'Kue  ',
                'deskripsi' => 'Pie susu dengan isian vla susu yang lembut dan kulit pie yang renyah. Praktis untuk oleh-oleh maupun camilan keluarga.',
                'masa_simpan' => '5 Hari (Suhu Ruang)',
                'label_gizi' => 'Sertifikat Halal Resmi',
                'image' => 'products/P5.png', 
                'diskon' => 10,
                'rating' => 4.8,
                'terjual' => 150,
            ],
            [
                'umkm_id' => $sapiMandiri->id,
                'nama_produk' => 'Permen Susu',
                'slug' => 'permen-susu',
                'harga' => 15000,
                'kategori' => 'Permen Susu',
                'deskripsi' => 'Susu sapi murni yang diprosess menjadi jajanan anak.',
                'masa_simpan' => '4 bulan (Suhu Ruang)',
                'label_gizi' => 'Halal, Tanpa Pengawet',
                'image' => 'products/P2.png', // <-- Sesuai gambar
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

        // $articles = [
        //     [
        //         'umkm_id' => $sapiMandiri->id,
        //         'title' => 'Sapi Mandiri Raih Sertifikasi CHSE',
        //         'slug' => Str::slug('Sapi Mandiri Raih Sertifikasi CHSE') . '-' . time(),
        //         'image' => 'articles/sapi_mandiri_chse.jpg',
        //         'content' => 'Alhamdulillah, berkat pendampingan dari tim KKN, Sapi Mandiri kini telah resmi mengantongi sertifikat CHSE (Cleanliness, Health, Safety, Environment Sustainability). Proses pemerahan susu kami dijamin 100% higienis.',
        //         'published_at' => now()->subDays(2),
        //     ],
        //     [
        //         'umkm_id' => $yoghurtCiyoo->id,
        //         'title' => 'Varian Rasa Baru: Mangga Gedong Gincu!',
        //         'slug' => Str::slug('Varian Rasa Baru Mangga Gedong Gincu') . '-' . time(),
        //         'image' => 'articles/yoghurt_mangga.jpg',
        //         'content' => 'Kabar gembira untuk pelanggan setia Yoghurt Ciyoo! Minggu ini kami meluncurkan varian rasa baru menggunakan mangga gedong gincu asli yang segar dan kaya vitamin C.',
        //         'published_at' => now()->subDays(5),
        //     ],
        //     [
        //         'umkm_id' => $yoeriCookies->id,
        //         'title' => 'Yoeri Cookies Hadir di Pameran UMKM Jabar',
        //         'slug' => Str::slug('Yoeri Cookies Hadir di Pameran UMKM Jabar') . '-' . time(),
        //         'image' => 'articles/yoeri_pameran.jpg',
        //         'content' => 'Terima kasih kepada pelanggan yang sudah mampir ke booth kami di Pameran UMKM Jawa Barat. Antusiasme terhadap Pie Susu Lembang sangat luar biasa hingga ludes terjual dalam 3 jam pertama.',
        //         'published_at' => now()->subDays(10),
        //     ]
        // ];

        // foreach ($articles as $article) {
        //     Article::updateOrCreate(
        //         ['title' => $article['title']],
        //         $article
        //     );
        // }
    }
}