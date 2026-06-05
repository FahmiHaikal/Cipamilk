<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Umkm;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('umkm')
            ->where('status', 'approved')
            ->latest()
            ->get();

        $umkm = Umkm::first();

        return view('landingpage', compact('products', 'umkm'));
    }
}
