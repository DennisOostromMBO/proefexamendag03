<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PakketOptieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pakket_opties')->insert([
            ['naam' => 'Snackpakketbasis'],
            ['naam' => 'Snackpakketluxe'],
            ['naam' => 'Kinderpartij'],
            ['naam' => 'Vrijgezellenfeest'],
        ]);
    }
}
