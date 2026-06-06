<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductVerificationController;
use App\Http\Controllers\Umkm\MyProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return 'Halo Super Admin';
})->middleware(['auth', 'super_admin']);

Route::get('/dashboard', function () {

    if (Auth::check() && Auth::user()->role === 'super_admin') {
        return view('dashboard.admin');
    }

    $products = Product::where(
        'umkm_id',
        Auth::user()->umkm_id
    )->get();

    return view('dashboard.umkm', [
        'totalProducts' => $products->count(),
        'totalStock' => $products->sum('stock'),
        'totalDiscounts' => $products
            ->whereNotNull('discount_price')
            ->count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::middleware(['auth', 'super_admin'])->prefix('admin')->group(function () {

    Route::get(
        '/products/pending',
        [ProductVerificationController::class, 'index']
    )->name('admin.products.pending');

    Route::post(
        '/products/{product}/approve',
        [ProductVerificationController::class, 'approve']
    )->name('admin.products.approve');

    Route::post(
        '/products/{product}/reject',
        [ProductVerificationController::class, 'reject']
    )->name('admin.products.reject');
});

Route::middleware(['auth'])->group(function () {

    Route::get(
        '/my-products',
        [MyProductController::class, 'index']
    )->name('my-products');
});

Route::get(
    '/my-products/create',
    [MyProductController::class, 'create']
)->middleware('auth');

Route::get(
    '/my-products/{product}/edit',
    [MyProductController::class, 'edit']
)->middleware('auth');

Route::put(
    '/my-products/{product}',
    [MyProductController::class, 'update']
)->middleware('auth');

Route::delete(
    '/my-products/{product}',
    [MyProductController::class, 'destroy']
)->middleware('auth');

Route::post(
    '/my-products',
    [MyProductController::class, 'store']
)->middleware('auth')
    ->name('my-products.store');

Route::patch(
    '/my-products/{product}/stock',
    [MyProductController::class, 'updateStock']
)->middleware('auth');

Route::patch(
    '/my-products/{product}/discount',
    [MyProductController::class, 'updateDiscount']
)->middleware('auth');

require __DIR__ . '/auth.php';
