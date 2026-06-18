<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Marketplace\Order;
use App\Models\Payments\PayoutRequest;

class RevenueController extends Controller
{
    public function index()
    {
        $totalRevenue = Order::where('status', OrderStatus::Delivered)->sum('total');
        $totalPayouts = PayoutRequest::where('status', 'approved')->sum('amount');
        $pendingPayouts = PayoutRequest::where('status', 'pending')->sum('amount');
        $netRevenue = $totalRevenue - $totalPayouts;

        $recentOrders = Order::with('parent')
            ->where('status', OrderStatus::Delivered)
            ->latest()
            ->take(10)
            ->get();

        return view('dashboard.admin.revenue.index', compact(
            'totalRevenue', 'totalPayouts', 'pendingPayouts', 'netRevenue', 'recentOrders'
        ));
    }
}
