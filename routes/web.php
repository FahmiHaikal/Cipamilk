<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/katalog', [ProductController::class, 'index'])->name('product.index');
Route::get('/katalog/{product:slug}', [ProductController::class, 'show'])->name('product.detail');

Route::get('/mitra/{umkm}', [UmkmController::class, 'show'])->name('umkm.detail');

Route::get('/jurnal', [ArticleController::class, 'index'])->name('article.index');
Route::get('/jurnal/{article:slug}', [ArticleController::class, 'show'])->name('article.detail');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:umkm'])->prefix('umkm')->group(function () {
    // Sementara kita arahkan ke view 'dashboard' bawaan Breeze
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('umkm.dashboard');
    
});


Route::middleware(['auth', 'role:admin'])->prefix('superadmin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('admin.dashboard');
    
});

Route::middleware(['auth', 'role:konsumen'])->group(function () {
});


require __DIR__.'/auth.php';