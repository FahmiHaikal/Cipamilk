<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductVerificationController;
use App\Http\Controllers\Umkm\MyProductController;
use App\Http\Controllers\Umkm\OrderController;
use App\Http\Controllers\Umkm\ReportController;
use App\Http\Controllers\Umkm\SettingController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', [HomeController::class, 'index'])
    ->name('landing');

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


Route::middleware('auth')->group(function () {

    Route::get(
        '/orders',
        [OrderController::class, 'index']
    )->name('orders');

    Route::get(
        '/orders/create',
        [OrderController::class, 'create']
    );

    Route::post(
        '/orders',
        [OrderController::class, 'store']
    );

    Route::patch(
        '/orders/{order}/status',
        [OrderController::class, 'updateStatus']
    );
});


Route::get(
    '/reports',
    [ReportController::class, 'index']
)->middleware('auth')
    ->name('reports');


Route::middleware('auth')->group(function () {

    Route::get(
        '/settings',
        [SettingController::class, 'index']
    )->name('settings.index');

    Route::put(
        '/settings/profile',
        [SettingController::class, 'updateProfile']
    )->name('settings.profile');

    Route::put(
        '/settings/account',
        [SettingController::class, 'updateAccount']
    )->name('settings.account');
});

require __DIR__ . '/auth.php';
