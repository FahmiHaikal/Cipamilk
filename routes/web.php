<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductVerificationController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Umkm\MyProductController;
use App\Http\Controllers\Umkm\OrderController;
use App\Http\Controllers\Umkm\ReportController;
use App\Http\Controllers\Umkm\SettingController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/produk', [HomeController::class, 'index'])
    ->name('landing');

Route::get('/p/{product}', [ProductController::class, 'show'])
    ->name('product.detail');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if (Auth::user()->role === 'super_admin') {
        return view('dashboard.admin');
    }

    $products = Product::where(
        'umkm_id',
        Auth::user()->umkm_id
    )->get();

    return view('dashboard.umkm', [
        'totalProducts'  => $products->count(),
        'totalStock'     => $products->sum('stock'),
        'totalDiscounts' => $products
            ->whereNotNull('discount_price')
            ->count(),
    ]);
})->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'super_admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get(
            '/products/pending',
            [ProductVerificationController::class, 'index']
        )->name('admin.products.pending');

        Route::post(
            '/products/{product}/approve',
            [ProductVerificationController::class, 'approve']
        )->name('admin.products.approve');

        Route::get(
            '/umkms',
            [UmkmController::class, 'index']
        )->name('admin.umkms.index');
    });

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| UMKM Product Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/my-products',
        [MyProductController::class, 'index']
    )->name('my-products');

    Route::get(
        '/my-products/create',
        [MyProductController::class, 'create']
    );

    Route::post(
        '/my-products',
        [MyProductController::class, 'store']
    )->name('my-products.store');

    Route::get(
        '/my-products/{product}/edit',
        [MyProductController::class, 'edit']
    );

    Route::put(
        '/my-products/{product}',
        [MyProductController::class, 'update']
    );

    Route::delete(
        '/my-products/{product}',
        [MyProductController::class, 'destroy']
    );

    Route::patch(
        '/my-products/{product}/stock',
        [MyProductController::class, 'updateStock']
    )->name('my-products.stock');

    Route::patch(
        '/my-products/{product}/discount',
        [MyProductController::class, 'updateDiscount']
    )->name('my-products.discount');
});

/*
|--------------------------------------------------------------------------
| Orders
|--------------------------------------------------------------------------
*/

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

/*
|--------------------------------------------------------------------------
| Reports
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/reports',
        [ReportController::class, 'index']
    )->name('reports');
});

/*
|--------------------------------------------------------------------------
| Settings
|--------------------------------------------------------------------------
*/

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