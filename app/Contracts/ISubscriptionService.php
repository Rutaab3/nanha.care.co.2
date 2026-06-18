<?php

namespace App\Contracts;

use App\Models\Payments\UserSubscription;

interface ISubscriptionService
{
    public function getActive(string $userId): ?UserSubscription;

    public function getPlans(): array;

    public function subscribe(string $userId, string $plan): UserSubscription;
}
