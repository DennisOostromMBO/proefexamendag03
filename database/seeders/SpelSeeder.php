<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('spel')->insert([
            ['id' => 1, 'PersoonId' => 1, 'ReserveringId' => 1],
            ['id' => 2, 'PersoonId' => 2, 'ReserveringId' => 2],
            ['id' => 3, 'PersoonId' => 3, 'ReserveringId' => 3],
            ['id' => 4, 'PersoonId' => 4, 'ReserveringId' => 5],
            ['id' => 5, 'PersoonId' => 6, 'ReserveringId' => 5],
            ['id' => 6, 'PersoonId' => 7, 'ReserveringId' => 5],
            ['id' => 7, 'PersoonId' => 8, 'ReserveringId' => 5],
        ]);
    }
}
