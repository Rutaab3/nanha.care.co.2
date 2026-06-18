<?php

namespace App\Services;

use App\Contracts\IPaymentService;
use App\Models\Payments\PaymentDetail;
use App\Models\Payments\PayoutRequest;
use Illuminate\Support\Collection;

class PaymentService implements IPaymentService
{
    public function createPayoutRequest(string $userId, float $amount): PayoutRequest
    {
        return PayoutRequest::create([
            'user_id' => $userId,
            'amount' => $amount,
            'status' => 'pending',
        ]);
    }

    public function getPayoutHistory(string $userId): Collection
    {
        return PayoutRequest::where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get();
    }

    public function getTransactionHistory(string $userId): Collection
    {
        return collect([
            'payouts' => PayoutRequest::where('user_id', $userId)
                ->where('status', 'completed')
                ->orderByDesc('processed_at')
                ->get(),
        ]);
    }

    public function savePaymentDetails(string $userId, array $data): PaymentDetail
    {
        return PaymentDetail::updateOrCreate(
            ['user_id' => $userId],
            $data
        );
    }
}
