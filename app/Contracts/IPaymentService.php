<?php

namespace App\Contracts;

use App\Models\Payments\PaymentDetail;
use App\Models\Payments\PayoutRequest;
use Illuminate\Support\Collection;

interface IPaymentService
{
    public function createPayoutRequest(string $userId, float $amount): PayoutRequest;

    public function getPayoutHistory(string $userId): Collection;

    public function getTransactionHistory(string $userId): Collection;

    public function savePaymentDetails(string $userId, array $data): PaymentDetail;
}
