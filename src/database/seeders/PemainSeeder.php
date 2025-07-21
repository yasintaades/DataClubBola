<?php

namespace Database\Seeders;

use App\Models\Pemain;
use Illuminate\Database\Seeder;

class PemainSeeder extends Seeder
{
    public function run(): void
    {
        Pemain::create([
            'name' => 'Agus Pratama',
            'position' => 'Midfielder',
            'number' => 10,
            'birthdate' => '2000-03-12',
            'club_id' => 1, // Pastikan klub dengan ID 1 ada
            'medical_record' => 'Riwayat cedera ACL 2022',
        ]);
    }
}
