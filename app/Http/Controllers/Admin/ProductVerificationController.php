<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductVerificationController extends Controller
{
    public function index()
    {
        $products = Product::with('umkm')
            ->where('status', 'pending')
            ->get();

        return view('admin.products.pending', compact('products'));
    }

    public function approve(Product $product)
    {
        $product->update([
            'status' => 'approved'
        ]);

        return back();
    }

    public function reject(Product $product)
    {
        $product->update([
            'status' => 'rejected'
        ]);

        return back();
    }
}