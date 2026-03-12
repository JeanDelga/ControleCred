<?php

namespace Database\Seeders;

use Database\Seeders\PlanSeeder;
use Database\Seeders\SubscriptionSeeder;
use Database\Seeders\TenantSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PlanSeeder::class,
            TenantSeeder::class,
            SubscriptionSeeder::class,
            UserSeeder::class,
        ]);
    }
}