<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('umkm')->latest()->get();

        return view('landingpage', compact('products'));
    }
}
