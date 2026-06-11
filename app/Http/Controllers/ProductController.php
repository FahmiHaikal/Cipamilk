<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request; // Tambahkan ini
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        // 1. Siapkan query dasar
        $query = Product::with('umkm')->latest();

        // 2. Logika Pencarian (Search)
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_produk', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }

        // 3. Logika Filter Kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        // 4. Terapkan Pagination (15 produk per halaman) & simpan query URL
        $products = $query->paginate(15)->withQueryString();

        // 5. Ambil daftar kategori unik dari database untuk ditampilkan di dropdown filter
        $kategoriList = Product::select('kategori')->distinct()->pluck('kategori');

        return view('products.index', compact('products', 'kategoriList'));
    }

    public function show(Product $product): View
    {
        $product->load('umkm');
        $relatedProducts = Product::query()
            ->with('umkm')
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(5)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}