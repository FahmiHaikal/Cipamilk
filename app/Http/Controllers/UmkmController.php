<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Product; // Pastikan import ini ada
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    // Fungsi untuk publik (katalog mitra)
    public function show(Umkm $umkm): View
    {
        $umkm->load(['products', 'articles']);
        return view('umkm.show', compact('umkm'));
    }

    // TAMBAHKAN FUNGSI INI untuk Dashboard internal UMKM
    public function dashboard(): View
    {
        // 1. Ambil ID UMKM dari user yang login
        $umkmId = Auth::user()->umkm->id;

        // 2. Ambil semua produk milik UMKM tersebut
        $products = Product::where('umkm_id', $umkmId)->get();

        // 3. Hitung statistik
        $totalProducts = $products->count();
        $totalStock = $products->sum('stock');
        $totalDiscounts = $products->where('discount_price', '>', 0)->count();

        // 4. Kirim ke view
        return view('umkm.dashboard', compact('totalProducts', 'totalStock', 'totalDiscounts'));
    }

    
}