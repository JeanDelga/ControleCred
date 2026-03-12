<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        Tenant::updateOrCreate(
            ['slug' => 'controlecred-demo'],
            [
                'name' => 'ControleCred Demo',
                'document' => '00.000.000/0001-00',
                'email' => 'admin@controlecred.com',
                'phone' => '(00) 00000-0000',
                'status' => 'active',
            ]
        );
    }
}