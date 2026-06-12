<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $query = Order::with('product')
            ->where('umkm_id', Auth::user()->umkm->id);

        if (request('sort') == 'oldest') {
            $query->orderBy('order_date', 'asc');
        } else {
            $query->orderBy('order_date', 'desc');
        }

        $orders = $query->get();

    $products = Product::query()
        ->where('umkm_id', Auth::user()->umkm->id)
        ->where('status', 'approved')
        ->get();

        $totalOrders = $orders->count();

        $totalRevenue = $orders
            ->where('status', 'completed')
            ->sum('total_price');

        $totalQty = $orders
            ->where('status', 'completed')
            ->sum('quantity');

        return view(
            'umkm.orders.index',
            compact(
                'orders',
                'products',
                'totalOrders',
                'totalRevenue',
                'totalQty'
            )
        );
    }

    public function create()
    {
    $products = Product::query()
        ->where('umkm_id', Auth::user()->umkm->id)
        ->where('status', 'approved')
        ->get();

        return view('umkm.orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'customer_name' => 'required',
            'customer_phone' => 'nullable',
            'quantity' => 'required|integer|min:1',
            'order_date' => 'required|date',
        ]);

        $product = Product::findOrFail(
            $request->product_id
        );

        $totalPrice =
            $product->harga *
            $request->quantity;

        Order::create([
            'product_id' => $product->id,
            'umkm_id' => Auth::user()->umkm->id,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'status' => 'pending',
            'order_date' => $request->order_date,
        ]);

        return redirect()->route('orders');
    }

    public function updateStatus(
        Request $request,
        Order $order
    ) {
        $request->validate([
            'status' => 'required'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return back();
    }
}
