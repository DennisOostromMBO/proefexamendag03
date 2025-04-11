<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UitslagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('uitslag')->insert([
            ['id' => 1, 'SpelId' => 1, 'Aantalpunten' => 290],
            ['id' => 2, 'SpelId' => 2, 'Aantalpunten' => 300],
            ['id' => 3, 'SpelId' => 3, 'Aantalpunten' => 120],
            ['id' => 4, 'SpelId' => 4, 'Aantalpunten' => 34],
            ['id' => 5, 'SpelId' => 5, 'Aantalpunten' => null],
            ['id' => 6, 'SpelId' => 6, 'Aantalpunten' => 234],
            ['id' => 7, 'SpelId' => 7, 'Aantalpunten' => 299],
        ]);
    }
}
