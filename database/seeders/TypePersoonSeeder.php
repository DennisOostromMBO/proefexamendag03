<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePersoonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_persoon')->insert([
            [
                'id' => 1,
                'type' => 'Klant',
            ],
            [
                'id' => 2,
                'type' => 'Medewerker',
            ],
            [
                'id' => 3,
                'type' => 'Gast',
            ],
        ]);
    }
}
