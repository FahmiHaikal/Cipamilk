<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Umkm;
use App\Models\Article; // Pastikan model Article di-import
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil Hot Items
        $hotItems = Product::with('umkm')
                    ->orderBy('terjual', 'desc')
                    ->take(8)
                    ->get();
        
        // 2. Ambil Daftar UMKM untuk bagian Mitra
        $umkms = Umkm::all();

        // 3. Ambil 3 Artikel/Berita terbaru
        // Gunakan get() kosong jika belum ada data, cegah error.
        $articles = Article::latest()->take(3)->get(); 

        return view('landingpage', compact('hotItems', 'umkms', 'articles'));
    }
}