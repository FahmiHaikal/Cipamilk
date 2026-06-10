<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(Product $product): View
    {
        $product->load('umkm');
        $relatedProducts = Product::query()
            ->with('umkm')
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(3)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function index()
    {
        $products = Product::with('umkm')->latest()->get();

        return view('products.index', compact('products'));
    }
}
