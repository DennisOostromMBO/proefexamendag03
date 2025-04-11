<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('spel')->insert([
            ['id' => 1, 'persoons_id' => 1, 'reservering_id' => 1, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['id' => 2, 'persoons_id' => 2, 'reservering_id' => 2, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['id' => 3, 'persoons_id' => 3, 'reservering_id' => 3, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['id' => 4, 'persoons_id' => 4, 'reservering_id' => 5, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['id' => 5, 'persoons_id' => 6, 'reservering_id' => 5, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['id' => 6, 'persoons_id' => 7, 'reservering_id' => 5, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['id' => 7, 'persoons_id' => 8, 'reservering_id' => 5, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
        ]);
    }
}
