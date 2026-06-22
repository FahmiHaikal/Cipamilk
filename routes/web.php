<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Umkm\MyProductController; 
use App\Http\Controllers\Umkm\OrderController; 
use App\Http\Controllers\Umkm\ReportController; 
use App\Http\Controllers\Umkm\SettingController; 

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/katalog', [ProductController::class, 'index'])->name('product.index');
Route::get('/katalog/{product:slug}', [ProductController::class, 'show'])->name('product.detail');

Route::get('/mitra/{umkm}', [UmkmController::class, 'show'])->name('umkm.detail');

Route::get('/jurnal', [ArticleController::class, 'index'])->name('article.index');
Route::get('/jurnal/{article:slug}', [ArticleController::class, 'show'])->name('article.detail');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:umkm', 'verified'])->prefix('umkm')->group(function () {
    // Rute status pending (dapat diakses oleh UMKM yang belum disetujui)
    Route::get('/pending-approval', function () {
        return view('umkm.pending');
    })->name('umkm.pending');

    // Rute yang membutuhkan approval admin
    Route::middleware('approved_umkm')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\UmkmController::class, 'dashboard'])->name('umkm.dashboard');
        Route::get('/products', [MyProductController::class, 'index'])->name('my-products');
        Route::get('/orders', [OrderController::class, 'index'])->name('orders');
        Route::get('/reports', [ReportController::class, 'index'])->name('reports');

        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings/profile', [SettingController::class, 'updateProfile'])->name('settings.profile');
        Route::put('/settings/account', [SettingController::class, 'updateAccount'])->name('settings.account');

        Route::get('/products/create', [MyProductController::class, 'create'])->name('products.create');
        Route::post('/products', [MyProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [MyProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [MyProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [MyProductController::class, 'destroy'])->name('products.destroy');
        Route::patch('/products/{product}/stock', [MyProductController::class, 'updateStock'])->name('products.stock');
        Route::patch('/products/{product}/discount', [MyProductController::class, 'updateDiscount'])->name('products.discount');

        Route::get('/orders', [OrderController::class, 'index'])->name('orders');
        Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
        Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.status');

        Route::get('/articles', [App\Http\Controllers\Umkm\ArticleController::class, 'index'])->name('umkm.articles.index');
        Route::get('/articles/create', [App\Http\Controllers\Umkm\ArticleController::class, 'create'])->name('umkm.articles.create');
        Route::post('/articles', [App\Http\Controllers\Umkm\ArticleController::class, 'store'])->name('umkm.articles.store');
        Route::delete('/articles/{article}', [App\Http\Controllers\Umkm\ArticleController::class, 'destroy'])->name('umkm.articles.destroy');
    });
});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('admin.products.pending');
    })->name('admin.dashboard');
    
    // Rute Verifikasi Produk
    Route::get('/products', [App\Http\Controllers\Admin\ProductVerificationController::class, 'index'])->name('admin.products.pending');
    Route::post('/products/{product}/approve', [App\Http\Controllers\Admin\ProductVerificationController::class, 'approve'])->name('admin.products.approve');
    Route::post('/products/{product}/reject', [App\Http\Controllers\Admin\ProductVerificationController::class, 'reject'])->name('admin.products.reject');
    Route::delete('/products/{product}', [App\Http\Controllers\Admin\ProductVerificationController::class, 'destroy'])->name('admin.products.destroy');

    // Rute Verifikasi UMKM
    Route::get('/umkms', [App\Http\Controllers\Admin\UmkmController::class, 'index'])->name('admin.umkms.index');
    Route::post('/umkms/{umkm}/approve', [App\Http\Controllers\Admin\UmkmController::class, 'approve'])->name('admin.umkms.approve');
    Route::post('/umkms/{umkm}/reject', [App\Http\Controllers\Admin\UmkmController::class, 'reject'])->name('admin.umkms.reject');
    Route::delete('/umkms/{umkm}', [App\Http\Controllers\Admin\UmkmController::class, 'destroy'])->name('admin.umkms.destroy');
});

Route::middleware(['auth', 'role:konsumen', 'verified'])->group(function () {
});

Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
    $user = $request->user();

    if ($user) {
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'umkm') {
            return redirect()->route('umkm.dashboard');
        } elseif ($user->role === 'konsumen') {
            return redirect()->route('home'); 
        }
    }
    
    return redirect('/'); 
})->name('dashboard');


require __DIR__.'/auth.php';