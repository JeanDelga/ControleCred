<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        Plan::updateOrCreate(
            ['name' => 'Básico'],
            [
                'price' => 49.90,
                'loan_limit' => 100,
                'user_limit' => 1,
                'features' => [
                    'dashboard',
                    'cadastro_de_clientes',
                    'cadastro_de_emprestimos',
                    'controle_de_pagamentos',
                ],
                'is_active' => true,
            ]
        );

        Plan::updateOrCreate(
            ['name' => 'Profissional'],
            [
                'price' => 99.90,
                'loan_limit' => 500,
                'user_limit' => 5,
                'features' => [
                    'dashboard',
                    'cadastro_de_clientes',
                    'cadastro_de_emprestimos',
                    'controle_de_pagamentos',
                    'relatorios',
                    'anotacoes_de_cobranca',
                ],
                'is_active' => true,
            ]
        );
    }
}