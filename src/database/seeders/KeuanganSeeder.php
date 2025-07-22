<?php

namespace Database\Seeders;

use App\Models\Keuangan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeuanganSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transactions')->truncate(); // Optional: clean for testing

        Keuangan::create([
            'club_id' => 1, // pastikan ID club ada
            'transaction_date' => now()->subDays(2),
            'type' => 'income',
            'category' => 'sponsorship',
            'amount' => 500000000,
            'description' => 'Dana sponsor utama dari PT Garuda Prima',
        ]);

        Keuangan::create([
            'club_id' => 1,
            'transaction_date' => now()->subDay(),
            'type' => 'expense',
            'category' => 'gaji pemain',
            'amount' => 120000000,
            'description' => 'Pembayaran gaji pemain bulan Juli',
        ]);
    }
}
