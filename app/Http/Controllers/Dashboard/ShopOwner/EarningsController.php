<?php

namespace App\Http\Controllers\Dashboard\ShopOwner;

use App\Contracts\IPaymentService;
use App\Enums\OrderStatus;
use App\Models\Marketplace\Order;
use App\Models\Marketplace\OrderItem;
use App\Models\System\PlatformSetting;
use Illuminate\Http\Request;

class EarningsController
{
    public function __construct(
        protected IPaymentService $service
    ) {}

    public function index()
    {
        $userId = auth()->id();
        $revenue = Order::whereHas('items.product.shop', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->where('status', OrderStatus::Delivered)->get();
        $payoutHistory = $this->service->getPayoutHistory($userId);

        $totalRevenue = (float) $revenue->sum('total');
        $paidPayouts = (float) $payoutHistory->whereIn('status', ['paid', 'approved'])->sum('amount');

        $earnings = [
            'total_revenue' => $totalRevenue,
            'pending_payout' => max(0, $totalRevenue - $paidPayouts),
            'total_orders' => $revenue->count(),
            'commission_percent' => PlatformSetting::get('commission_percent', '10'),
        ];

        return view('dashboard.shop-owner.earnings.index', compact('earnings', 'revenue', 'payoutHistory'));
    }

    public function chartData()
    {
        $userId = auth()->id();
        $months = collect();

        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $total = OrderItem::whereHas('product.shop', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })->whereHas('order', function ($q) use ($date) {
                $q->where('status', OrderStatus::Delivered)
                    ->whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month);
            })->sum('price');

            $months->push([
                'month' => $date->format('Y-m'),
                'total' => (float) $total,
            ]);
        }

        return response()->json($months);
    }

    public function payoutRequest(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:500',
        ]);

        $this->service->createPayoutRequest(auth()->id(), $request->amount);

        return redirect()->back()->with('success', 'Payout request submitted successfully.');
    }
}
