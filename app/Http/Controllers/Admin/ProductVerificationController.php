<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductVerificationController extends Controller
{
    public function index()
    {
        $status = request('status');

        $query = Product::with('umkm');

        if ($status) {
            $query->where('status', $status);
        }

        $products = $query->latest()->get();

        $totalProducts = Product::count();

        $approvedCount = Product::where(
            'status',
            'approved'
        )->count();

        $pendingCount = Product::where(
            'status',
            'pending'
        )->count();

        return view('admin.products.pending', compact(
            'products',
            'totalProducts',
            'approvedCount',
            'pendingCount'
        ));
    }

    public function approve($id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'status' => 'approved'
        ]);

        return back()->with('success', 'Produk berhasil disetujui.');
    }

    public function reject($id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'status' => 'rejected'
        ]);

        return back()->with('success', 'Produk berhasil ditolak.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return back()->with('success', 'Produk berhasil dihapus.');
    }
}
