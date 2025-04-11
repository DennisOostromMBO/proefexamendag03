<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReserveringStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reserveringstatussen')->insert([
            ['naam' => 'Klant'],
            ['naam' => 'Medewerker'],
            ['naam' => 'Gast'],
        ]);
    }
}
