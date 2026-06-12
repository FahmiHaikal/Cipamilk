<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request; // Tambahkan ini
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        // 1. Siapkan query dasar (hanya produk yang approved)
        $query = Product::with('umkm')->where('status', 'approved')->latest();

        // 2. Logika Pencarian (Search) - Dikelompokkan agar status approved tetap terjaga
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('nama_produk', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
            });
        }

        // 3. Logika Filter Kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        // 4. Terapkan Pagination (15 produk per halaman) & simpan query URL
        $products = $query->paginate(15)->withQueryString();

        // 5. Ambil daftar kategori unik dari produk approved untuk dropdown filter
        $kategoriList = Product::where('status', 'approved')->select('kategori')->distinct()->pluck('kategori');

        return view('products.index', compact('products', 'kategoriList'));
    }

    public function show(Product $product): View
    {
        // Cegah akses produk non-approved oleh publik
        if ($product->status !== 'approved') {
            $user = auth()->user();
            $isOwner = $user && $user->role === 'umkm' && $user->umkm && $user->umkm->id === $product->umkm_id;
            $isAdmin = $user && $user->role === 'admin';

            if (!$isOwner && !$isAdmin) {
                abort(404);
            }
        }

        $product->load('umkm');
        $relatedProducts = Product::query()
            ->with('umkm')
            ->where('status', 'approved')
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(5)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}