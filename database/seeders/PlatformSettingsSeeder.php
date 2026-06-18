<?php

namespace Database\Seeders;

use App\Models\System\PlatformSetting;
use Illuminate\Database\Seeder;

class PlatformSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'commission_percent' => '10',
            'booking_fee_pkr' => '500',
            'maintenance_mode' => 'false',
            'plan_free_price' => '0',
            'plan_basic_price' => '999',
            'plan_premium_price' => '1999',
            'terms_of_service' => '',
            'privacy_policy' => '',
        ];

        foreach ($settings as $key => $value) {
            PlatformSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
