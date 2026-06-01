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
        // 1. Data UMKM: Sapi Mandiri
        $sapiMandiri = Umkm::create([
            'nama_umkm' => 'Sapi Mandiri Cipageran',
            'pemilik' => 'Bapak Uden',
            'whatsapp' => '6281234567890', // Ganti dengan nomor asli nanti
            'alamat' => 'Sentra Susu Cipageran, Kota Cimahi',
            'story' => 'Fokus menyuplai pabrik dan agen besar. Memproduksi susu pasteurisasi, yogurt botol, dan keju mozarella berkualitas tinggi.',
        ]);

        // Produk Sapi Mandiri
        Product::create([
            'umkm_id' => $sapiMandiri->id,
            'nama_produk' => 'Susu Pasteurisasi Segar',
            'harga' => 15000,
            'kategori' => 'Susu Segar',
            'deskripsi' => 'Susu sapi murni yang dipasteurisasi dengan suhu tepat, menjaga nutrisi tanpa pengawet.',
            'masa_simpan' => '4 Jam (Suhu Ruang) / 3 Hari (Kulkas)',
            'label_gizi' => 'Halal, Tanpa Pengawet',
        ]);

        Product::create([
            'umkm_id' => $sapiMandiri->id,
            'nama_produk' => 'Keju Mozarella Lokal',
            'harga' => 100000,
            'kategori' => 'Keju',
            'deskripsi' => 'Keju mozarella lokal berkualitas ekspor. Lumer dan cocok untuk berbagai hidangan.',
            'masa_simpan' => '3 Bulan (Freezer)',
            'label_gizi' => 'Halal, Tinggi Kalsium',
        ]);

        // 2. Data UMKM: Yoghurt Ciyoo
        $yoghurtCiyoo = Umkm::create([
            'nama_umkm' => 'Yoghurt Ciyoo',
            'pemilik' => 'Ibu Dini',
            'whatsapp' => '6289876543210',
            'alamat' => 'Sentra Susu Cipageran, Kota Cimahi',
            'story' => 'Menjual yogurt dan es lilin yogurt kesukaan anak-anak. Pemasaran difokuskan di area terdekat, warung, dan sekolah.',
        ]);

        // Produk Yoghurt Ciyoo
        Product::create([
            'umkm_id' => $yoghurtCiyoo->id,
            'nama_produk' => 'Yoghurt Botol Ciyoo (Aneka Rasa)',
            'harga' => 8000,
            'kategori' => 'Yoghurt',
            'deskripsi' => 'Yoghurt botol segar dengan berbagai varian rasa buah asli. Cocok untuk pencernaan.',
            'masa_simpan' => '7 Hari (Kulkas)',
            'label_gizi' => 'Halal, Probiotik Alami',
        ]);

        Product::create([
            'umkm_id' => $yoghurtCiyoo->id,
            'nama_produk' => 'Es Lilin Yoghurt',
            'harga' => 3000,
            'kategori' => 'Cemilan',
            'deskripsi' => 'Es lilin jadul dengan bahan dasar yoghurt sehat.',
            'masa_simpan' => '2 Minggu (Freezer)',
            'label_gizi' => 'Halal, Jajanan Sehat',
        ]);

        // 3. Data UMKM: Yoeri Cookies
        $yoeriCookies = Umkm::create([
            'nama_umkm' => 'Yoeri Cookies',
            'pemilik' => 'Ibu Esih',
            'whatsapp' => '6285551234567',
            'alamat' => 'Sentra Susu Cipageran, Kota Cimahi',
            'story' => 'Memproduksi bolu dan pie susu lezat. Sudah memiliki sertifikat Halal resmi.',
        ]);

        // Produk Yoeri Cookies
        Product::create([
            'umkm_id' => $yoeriCookies->id,
            'nama_produk' => 'Pie Susu Lembang',
            'harga' => 35000,
            'kategori' => 'Cemilan',
            'deskripsi' => 'Pie susu dengan isian vla susu yang lembut dan kulit pie yang renyah.',
            'masa_simpan' => '5 Hari (Suhu Ruang)',
            'label_gizi' => 'Sertifikat Halal Resmi',
        ]);
    }
}
