<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePersoonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('type_persoons')->insert([
            ['naam' => 'Klant'],
            ['naam' => 'Medewerker'],
            ['naam' => 'Gast'],
        ]);
    }
}

