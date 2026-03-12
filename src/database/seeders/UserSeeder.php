<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $tenant = Tenant::where('slug', 'controlecred-demo')->first();

        if (! $tenant) {
            return;
        }

        User::updateOrCreate(
            ['email' => 'admin@controlecred.com'],
            [
                'tenant_id' => $tenant->id,
                'name' => 'Jean Admin',
                'password' => Hash::make('12345678'),
                'role' => 'owner',
                'is_active' => true,
            ]
        );
    }
}