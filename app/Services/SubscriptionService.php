<?php

namespace App\Services;

use App\Contracts\ISubscriptionService;
use App\Models\Payments\UserSubscription;
use App\Models\System\PlatformSetting;

class SubscriptionService implements ISubscriptionService
{
    public function getActive(string $userId): ?UserSubscription
    {
        return UserSubscription::where('user_id', $userId)
            ->where('is_active', true)
            ->where('expires_at', '>', now())
            ->first();
    }

    public function getPlans(): array
    {
        $plans = PlatformSetting::get('subscription_plans');
        return $plans ? json_decode($plans, true) : [
            ['name' => 'Free', 'price' => 0, 'features' => ['Basic support']],
            ['name' => 'Premium', 'price' => 9.99, 'features' => ['Priority support', 'Advanced analytics']],
        ];
    }

    public function subscribe(string $userId, string $plan): UserSubscription
    {
        UserSubscription::where('user_id', $userId)->where('is_active', true)
            ->update(['is_active' => false]);

        return UserSubscription::create([
            'user_id' => $userId,
            'plan' => $plan,
            'started_at' => now(),
            'expires_at' => now()->addMonth(),
            'is_active' => true,
        ]);
    }
}
