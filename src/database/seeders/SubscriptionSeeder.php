<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        $tenant = Tenant::where('slug', 'controlecred-demo')->first();
        $plan = Plan::where('name', 'Profissional')->first();

        if (! $tenant || ! $plan) {
            return;
        }

        Subscription::updateOrCreate(
            ['tenant_id' => $tenant->id, 'plan_id' => $plan->id],
            [
                'status' => 'active',
                'starts_at' => now(),
                'ends_at' => now()->addMonth(),
                'trial_ends_at' => null,
                'gateway' => 'manual',
                'gateway_subscription_id' => 'SUB-DEMO-001',
            ]
        );
    }
}