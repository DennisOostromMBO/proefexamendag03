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
                'Naam' => 'Klant',
            ],
            [
                'id' => 2,
                'Naam' => 'Medewerker',
            ],
            [
                'id' => 3,
                'Naam' => 'Gast',
            ],
        ]);
    }
}
