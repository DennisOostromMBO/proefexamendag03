<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersoonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First make sure we have the type_persoons table populated
        if (DB::table('type_persoons')->count() === 0) {
            DB::table('type_persoons')->insert([
                ['id' => 1, 'naam' => 'Klant', 'is_active' => 1, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
                ['id' => 2, 'naam' => 'Medewerker', 'is_active' => 1, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
                ['id' => 3, 'naam' => 'Gast', 'is_active' => 1, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ]);
        }

        // Now insert the persoons data with proper type_persoon_id values
        DB::table('persoons')->insert([
            ['id' => 1, 'type_persoon_id' => 1, 'voornaam' => 'Mazin', 'tussenvoegsel' => null, 'achternaam' => 'Jamil', 'roepnaam' => 'Mazin', 'is_volwassen' => 1, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['id' => 2, 'type_persoon_id' => 1, 'voornaam' => 'Arjan', 'tussenvoegsel' => 'de', 'achternaam' => 'Ruijter', 'roepnaam' => 'Arjan', 'is_volwassen' => 1, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['id' => 3, 'type_persoon_id' => 1, 'voornaam' => 'Hans', 'tussenvoegsel' => null, 'achternaam' => 'Odijk', 'roepnaam' => 'Hans', 'is_volwassen' => 1, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['id' => 4, 'type_persoon_id' => 1, 'voornaam' => 'Dennis', 'tussenvoegsel' => 'van', 'achternaam' => 'Wakeren', 'roepnaam' => 'Dennis', 'is_volwassen' => 1, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['id' => 5, 'type_persoon_id' => 2, 'voornaam' => 'Wilco', 'tussenvoegsel' => 'Van de', 'achternaam' => 'Grift', 'roepnaam' => 'Wilco', 'is_volwassen' => 1, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['id' => 6, 'type_persoon_id' => 3, 'voornaam' => 'Tom', 'tussenvoegsel' => null, 'achternaam' => 'Sanders', 'roepnaam' => 'Tom', 'is_volwassen' => 0, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['id' => 7, 'type_persoon_id' => 3, 'voornaam' => 'Andrew', 'tussenvoegsel' => null, 'achternaam' => 'Sanders', 'roepnaam' => 'Andrew', 'is_volwassen' => 0, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
            ['id' => 8, 'type_persoon_id' => 3, 'voornaam' => 'Julian', 'tussenvoegsel' => null, 'achternaam' => 'Kaldenheuvel', 'roepnaam' => 'Julian', 'is_volwassen' => 1, 'is_active' => 1, 'opmerking' => null, 'datum_aangemaakt' => now(), 'datum_gewijzigd' => now()],
        ]);
    }
}


