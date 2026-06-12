<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProductController extends Controller
{
    public function index()
    {
        $products = Product::with('umkm')
            ->where('umkm_id', Auth::user()->umkm->id)
            ->get();

        return view('umkm.products.index', compact('products'));
    }

    public function create()
    {
        return view('umkm.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0|max:999999999',
            'kategori' => 'required|in:Susu,Es,Kue,Yogurt,Minuman,Makanan Ringan,Keju,Mentega,Produk Kecantikan,Lainnya',
            'deskripsi' => 'required|string|max:2000',
            'label_gizi' => 'required|string|max:255',
            'stock' => 'required|integer|min:0|max:99999',
            'discount_price' => 'nullable|integer|min:0|max:100',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'masa_simpan' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
            'terjual' => 'required|integer|min:0|max:99999',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request
                ->file('image')
                ->store('products', 'public');
        }

        Product::create([
            'umkm_id' => Auth::user()->umkm->id,
            'nama_produk' => $request->nama_produk,
            'slug' => Str::slug($request->nama_produk),
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'label_gizi' => $request->label_gizi,
            'diskon' => $request->discount_price,
            'image' => $imagePath,
            'rating' => $request->rating,
            'terjual' => $request->terjual,
            'masa_simpan' => $request->masa_simpan,
            'status' => 'pending',
            'stock' => $request->stock,

        ]);

        return redirect()->route('my-products');
    }

    public function edit(Product $product)
    {

        if ($product->umkm_id !== Auth::user()->umkm->id) {
            abort(403);
        }

        return view('umkm.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->umkm_id !== Auth::user()->umkm->id) {
            abort(403);
        }

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0|max:999999999',
            'kategori' => 'required|in:Susu,Es,Kue,Yogurt,Minuman,Makanan Ringan,Keju,Mentega,Produk Kecantikan,Lainnya',
            'deskripsi' => 'required|string|max:2000',
            'masa_simpan' => 'required|string|max:255',
            'label_gizi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'rating' => 'required|numeric|min:0|max:5',
            'terjual' => 'required|integer|min:0|max:99999',
        ]);

        $imagePath = $product->image;

        if ($request->hasFile('foto')) {
            $imagePath = $request
                ->file('foto')
                ->store('products', 'public');
        }

        $product->update([
            'nama_produk' => $request->nama_produk,
            'slug' => Str::slug($request->nama_produk),
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'masa_simpan' => $request->masa_simpan,
            'label_gizi' => $request->label_gizi,
            'image' => $imagePath,
            'rating' => $request->rating,
            'terjual' => $request->terjual,
        ]);

        return redirect()->route('my-products');
    }

    public function updateStock(Request $request, Product $product)
    {
        if ($product->umkm_id !== Auth::user()->umkm->id) {
            abort(403);
        }

        $request->validate([
            'stock' => 'required|integer|min:0|max:99999',
        ]);

        $product->update([
            'stock' => $request->stock
        ]);

        return back();
    }

    public function updateDiscount(Request $request, Product $product)
    {
        if ($product->umkm_id !== Auth::user()->umkm->id) {
            abort(403);
        }

        $request->validate([
            'discount_price' => 'nullable|integer|min:0|max:100',
        ]);

        $product->update([
            'diskon' => $request->discount_price
        ]);

        return back();
    }

    public function destroy(Product $product)
    {
        if ($product->umkm_id !== Auth::user()->umkm->id) {
            abort(403);
        }

        $product->delete();

        return back();
    }
}
