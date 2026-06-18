<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'admin',
            'moderator',
            'parent',
            'babysitter',
            'shop_owner',
            'doctor',
            'support_agent',
        ];

        foreach ($roles as $role) {
            Role::findOrCreate($role);
        }
    }
}
