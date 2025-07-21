<?php

namespace Database\Seeders;

use App\Models\Klub;
use Illuminate\Database\Seeder;

class KlubSeeder extends Seeder
{
    public function run(): void
    {
        $klubs = [
            [
                'name' => 'FC Garuda',
                'stadium' => 'Stadion Merah Putih',
                'city' => 'Jakarta',
                'bank_account_number' => '1111111111',
            ],
            [
                'name' => 'Bali United',
                'stadium' => 'Kapten Dipta',
                'city' => 'Gianyar',
                'bank_account_number' => '2222222222',
            ],
            [
                'name' => 'Arema FC',
                'stadium' => 'Kanjuruhan',
                'city' => 'Malang',
                'bank_account_number' => '3333333333',
            ],
        ];

        foreach ($klubs as $klub) {
            Klub::create($klub);
        }
    }
}
