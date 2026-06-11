<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\umkm\MyProductController; 
use App\Http\Controllers\umkm\OrderController; 
use App\Http\Controllers\umkm\ReportController; 
use App\Http\Controllers\umkm\SettingController; 

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

    Route::get('/dashboard', [App\Http\Controllers\UmkmController::class, 'dashboard'])->name('umkm.dashboard');
    Route::get('/products', [MyProductController::class, 'index'])->name('my-products');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings/profile', [SettingController::class, 'updateProfile'])->name('settings.profile');
    Route::put('/settings/account', [SettingController::class, 'updateAccount'])->name('settings.account');

    Route::get('/products', [MyProductController::class, 'index'])->name('my-products');
    Route::get('/products/create', [MyProductController::class, 'create'])->name('products.create');
    Route::post('/products', [MyProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [MyProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [MyProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [MyProductController::class, 'destroy'])->name('products.destroy');
    Route::patch('/products/{product}/stock', [MyProductController::class, 'updateStock'])->name('products.stock');
    Route::patch('/products/{product}/discount', [MyProductController::class, 'updateDiscount'])->name('products.discount');

    });


Route::middleware(['auth', 'role:admin'])->prefix('superadmin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('admin.dashboard');
    
});

Route::middleware(['auth', 'role:konsumen'])->group(function () {
});


require __DIR__.'/auth.php';