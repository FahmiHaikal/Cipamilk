<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')
            ->where('umkm_id', Auth::user()->umkm_id)
            ->where('status', 'completed')
            ->get();

        $month = request('month');
        $year = request('year');

        $query = Order::with('product')
            ->where('umkm_id', Auth::user()->umkm_id)
            ->where('status', 'completed');

        if ($month) {
            $query->whereMonth('order_date', $month);
        }

        if ($year) {
            $query->whereYear('order_date', $year);
        }

        $orders = $query->get();

        $totalOrders = $orders->count();

        $totalRevenue = $orders->sum('total_price');

        $totalProductsSold = $orders->sum('quantity');

        $productSummary = $orders
            ->groupBy('product_id')
            ->map(function ($items) {

                $product = $items->first()->product;

                return [
                    'name' => $product->nama_produk,
                    'qty' => $items->sum('quantity'),
                    'revenue' => $items->sum('total_price'),
                    'avg_price' => round(
                        $items->sum('total_price') /
                            $items->sum('quantity')
                    ),
                ];
            })
            ->sortByDesc('qty');

        $chartData = $orders
            ->sortBy('order_date');

        $chartLabels = $chartData
            ->pluck('order_date')
            ->map(
                fn($date) =>
                \Carbon\Carbon::parse($date)->format('d M')
            );

        $chartValues = $chartData
            ->pluck('total_price');

        return view(
            'umkm.reports.index',
            compact(
                'orders',
                'totalOrders',
                'totalRevenue',
                'totalProductsSold',
                'productSummary',
                'chartData',
                'chartLabels',
                'chartValues'
            )
        );
    }
}
