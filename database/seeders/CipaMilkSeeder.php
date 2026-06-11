<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Umkm;
use Illuminate\Database\Seeder;

class CipaMilkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sapiMandiri = Umkm::updateOrCreate(
            ['nama_umkm' => 'Sapi Mandiri Cipageran'],
            [
                'pemilik' => 'Bapak Uden',
                'whatsapp' => '6281234567890',
                'alamat' => 'Sentra Susu Cipageran, Kota Cimahi',
                'story' => 'Fokus menyuplai pabrik dan agen besar. Memproduksi susu pasteurisasi, yoghurt botol, dan keju mozarella berkualitas tinggi.',
            ]
        );

        $yoghurtCiyoo = Umkm::updateOrCreate(
            ['nama_umkm' => 'Yoghurt Ciyoo'],
            [
                'pemilik' => 'Ibu Dini',
                'whatsapp' => '6289876543210',
                'alamat' => 'Sentra Susu Cipageran, Kota Cimahi',
                'story' => 'Menjual yoghurt dan es lilin yoghurt kesukaan anak-anak. Pemasaran difokuskan di area terdekat, warung, dan sekolah.',
            ]
        );

        $yoeriCookies = Umkm::updateOrCreate(
            ['nama_umkm' => 'Yoeri Cookies'],
            [
                'pemilik' => 'Ibu Esih',
                'whatsapp' => '6285551234567',
                'alamat' => 'Sentra Susu Cipageran, Kota Cimahi',
                'story' => 'Memproduksi bolu dan pie susu lezat. Sudah memiliki sertifikat Halal resmi.',
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
                'image' => 'assets/images/products/yoghurt_botol_ciyo_image_products.png',
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
                'image' => 'assets/images/products/es_lilin_yogurth_image_products.png',
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
                'image' => 'assets/images/products/keju_mozarella_lokal_image_products.png',
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
                'image' => 'assets/images/products/pie_susu_lembang_image_products.png',
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
                'image' => 'assets/images/products/susu_pasteurisasi_segar_image_products.png',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                $product
            );
        }
    }
}
