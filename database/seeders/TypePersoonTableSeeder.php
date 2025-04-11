<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePersoonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('typepersoon')->insert([
            ['id' => 1, 'naam' => 'Klant'],
            ['id' => 2, 'naam' => 'Medewerker'],
            ['id' => 3, 'naam' => 'Gast'],
        ]);
    }
}
