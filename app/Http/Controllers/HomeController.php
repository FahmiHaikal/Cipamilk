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
        // 1. Ambil Hot Items (hanya yang statusnya approved)
        $hotItems = Product::with('umkm')
                    ->where('status', 'approved')
                    ->orderBy('terjual', 'desc')
                    ->take(8)
                    ->get();
        
        // 2. Ambil Daftar UMKM untuk bagian Mitra (hanya yang statusnya approved)
        $umkms = Umkm::where('status', 'approved')->get();

        // 3. Ambil 3 Artikel/Berita terbaru
        // Gunakan get() kosong jika belum ada data, cegah error.
        $articles = Article::latest()->take(3)->get(); 

        return view('landingpage', compact('hotItems', 'umkms', 'articles'));
    }
}