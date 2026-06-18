<?php

namespace App\Http\Controllers\Dashboard\Babysitter;

use App\Contracts\IPaymentService;
use App\Models\Babysitting\Booking;
use App\Enums\BookingStatus;
use Illuminate\Http\Request;

class EarningsController
{
    public function __construct(
        protected IPaymentService $service
    ) {}

    public function index()
    {
        $userId = auth()->id();
        $earnings = Booking::where('babysitter_id', $userId)
            ->where('status', BookingStatus::Completed)
            ->orderByDesc('date')
            ->get();
        $payoutHistory = $this->service->getPayoutHistory($userId);
        return view('dashboard.babysitter.earnings.index', compact('earnings', 'payoutHistory'));
    }

    public function chartData()
    {
        $userId = auth()->id();
        $months = collect();
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $total = Booking::where('babysitter_id', $userId)
                ->where('status', BookingStatus::Completed)
                ->whereYear('date', $date->year)
                ->whereMonth('date', $date->month)
                ->sum('total_fee');
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
        return redirect()->back()->with('success', 'Payout request submitted.');
    }
}
