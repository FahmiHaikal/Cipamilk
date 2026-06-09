<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UmkmController;
use Illuminate\Support\Facades\Route;

// Beranda 
Route::get('/', [HomeController::class, 'index'])->name('home');

// Katalog Produk
Route::get('/katalog', [ProductController::class, 'index'])->name('product.index');
Route::get('/katalog/{product}', [ProductController::class, 'show'])->name('product.detail');

// Profil UMKM 
Route::get('/mitra/{umkm}', [UmkmController::class, 'show'])->name('umkm.detail');