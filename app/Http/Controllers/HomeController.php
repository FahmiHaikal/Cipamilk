<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

public function index()
{
    $hotItems = Product::with('umkm')
                ->orderBy('terjual', 'desc')
                ->take(8)
                ->get();

    return view('landingpage', compact('hotItems'));
}

    // public function index()
    // {
    //     $products = Product::with('umkm')->latest()->get();

    //     return view('landingpage', compact('products'));
    // }
}
