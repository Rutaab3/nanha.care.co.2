<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@nanhacare.pk')],
            [
                'name' => env('ADMIN_NAME', 'Admin'),
                'password' => env('ADMIN_PASSWORD', 'admin123'),
                'phone' => env('ADMIN_PHONE'),
                'city' => env('ADMIN_CITY'),
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        $user->assignRole('admin');
    }
}
