<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaanSeeder extends Seeder
{
    public function run(): void
    {
        $baans = [
            [1, false], [2, false], [3, false], [4, false],
            [5, false], [6, false], [7, true], [8, true],
        ];

        foreach ($baans as [$nummer, $heeftHek]) {
            DB::table('baans')->insert([
                'nummer' => $nummer,
                'heeft_hek' => $heeftHek,
            ]);
        }
    }
}
