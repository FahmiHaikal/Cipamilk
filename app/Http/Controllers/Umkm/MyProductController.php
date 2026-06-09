<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProductController extends Controller
{
    public function index()
    {
        $products = Product::with('umkm')
            ->where('umkm_id', Auth::user()->umkm_id)
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
            'nama_produk' => 'required',
            'harga' => 'required|integer|min:0',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'stock' => 'required|integer|min:0',
            'discount_price' => 'nullable|integer|min:0|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request
                ->file('image')
                ->store('products', 'public');
        }

        Product::create([
            'umkm_id' => Auth::user()->umkm_id,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'stock' => $request->stock,
            'discount_price' => $request->discount_price,
            'image' => $imagePath,
            'status' => 'pending',
        ]);

        return redirect()->route('my-products');
    }

    public function edit(Product $product)
    {
        if ($product->umkm_id !== Auth::user()->umkm_id) {
            abort(403);
        }

        return view('umkm.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->umkm_id !== Auth::user()->umkm_id) {
            abort(403);
        }

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required',
            'masa_simpan' => 'nullable|string|max:255',
            'label_gizi' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
            'discount_price' => 'nullable|integer|min:0|max:100',
        ]);

        $product->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'masa_simpan' => $request->masa_simpan,
            'label_gizi' => $request->label_gizi,
            'stock' => $request->stock,
            'discount_price' => $request->discount_price,
            'status' => 'pending',
        ]);

        return redirect()->route('my-products');
    }

    public function updateStock(Request $request, Product $product)
    {
        if ($product->umkm_id !== Auth::user()->umkm_id) {
            abort(403);
        }

        $request->validate([
            'stock' => 'required|integer|min:0'
        ]);

        $product->update([
            'stock' => $request->stock
        ]);

        return back();
    }

    public function updateDiscount(Request $request, Product $product)
    {
        if ($product->umkm_id !== Auth::user()->umkm_id) {
            abort(403);
        }

        $request->validate([
            'discount_price' => 'nullable|integer|min:0'
        ]);

        $product->update([
            'discount_price' => $request->discount_price
        ]);

        return back();
    }

    public function destroy(Product $product)
    {
        if ($product->umkm_id !== Auth::user()->umkm_id) {
            abort(403);
        }

        $product->delete();

        return back();
    }
}
