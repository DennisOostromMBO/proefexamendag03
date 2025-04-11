<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('baan')->insert([
            ['id' => 1, 'nummer' => 1, 'heeft_hek' => false],
            ['id' => 2, 'nummer' => 2, 'heeft_hek' => false],
            ['id' => 3, 'nummer' => 3, 'heeft_hek' => false],
            ['id' => 4, 'nummer' => 4, 'heeft_hek' => false],
            ['id' => 5, 'nummer' => 5, 'heeft_hek' => false],
            ['id' => 6, 'nummer' => 6, 'heeft_hek' => false],
            ['id' => 7, 'nummer' => 7, 'heeft_hek' => true],
            ['id' => 8, 'nummer' => 8, 'heeft_hek' => true],
        ]);
    }
}
