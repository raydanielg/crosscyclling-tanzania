<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_settings')->updateOrInsert(
            ['key' => 'lipa_namba'],
            [
                'value' => '253627',
                'description' => 'Official Lipa Namba for event registrations',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
