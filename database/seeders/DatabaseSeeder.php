<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Models\Conta;


class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Conta::truncate();

        $contas = [
            [
                'id' => 1,
                'conta' => '1001',
                'nome' => 'Amanda',
                'saldo' => 1000,
                'updated_at' => null
            ],
            [
                'id' => 2,
                'conta' => '1002',
                'nome' => 'Bernardo',
                'saldo' => 1500,
                'updated_at' => null
            ],
            [
                'id' => 3,
                'conta' => '1003',
                'nome' => 'Carlos',
                'saldo' => 1234.56,
                'updated_at' => null
            ]

        ];
        Conta::insert($contas);
    }
}
