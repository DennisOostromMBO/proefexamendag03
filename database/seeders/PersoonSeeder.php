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
        DB::table('persoons')->insert([
            [
                'id' => 1,
                'type_persoon' => 1, // Klant
                'Voornaam' => 'Mazin',
                'Tussenvoegsel' => null,
                'Achternaam' => 'Jamil',
                'Roepnaam' => 'Mazin',
                'IsVolwassen' => true,
            ],
            [
                'id' => 2,
                'type_persoon' => 1, // Klant
                'Voornaam' => 'Arjan',
                'Tussenvoegsel' => 'de',
                'Achternaam' => 'Ruijter',
                'Roepnaam' => 'Arjan',
                'IsVolwassen' => true,
            ],
            [
                'id' => 3,
                'type_persoon' => 1, // Klant
                'Voornaam' => 'Hans',
                'Tussenvoegsel' => null,
                'Achternaam' => 'Odijk',
                'Roepnaam' => 'Hans',
                'IsVolwassen' => true,
            ],
            [
                'id' => 4,
                'type_persoon' => 1, // Klant
                'Voornaam' => 'Dennis',
                'Tussenvoegsel' => 'van',
                'Achternaam' => 'Wakeren',
                'Roepnaam' => 'Dennis',
                'IsVolwassen' => true,
            ],
            [
                'id' => 5,
                'type_persoon' => 2, // Medewerker
                'Voornaam' => 'Wilco',
                'Tussenvoegsel' => 'Van de',
                'Achternaam' => 'Grift',
                'Roepnaam' => 'Wilco',
                'IsVolwassen' => true,
            ],
            [
                'id' => 6,
                'type_persoon' => 3, // Gast
                'Voornaam' => 'Tom',
                'Tussenvoegsel' => null,
                'Achternaam' => 'Sanders',
                'Roepnaam' => 'Tom',
                'IsVolwassen' => false,
            ],
            [
                'id' => 7,
                'type_persoon' => 3, // Gast
                'Voornaam' => 'Andrew',
                'Tussenvoegsel' => null,
                'Achternaam' => 'Sanders',
                'Roepnaam' => 'Andrew',
                'IsVolwassen' => false,
            ],
            [
                'id' => 8,
                'type_persoon' => 3, // Gast
                'Voornaam' => 'Julian',
                'Tussenvoegsel' => null,
                'Achternaam' => 'Kaldenheuvel',
                'Roepnaam' => 'Julian',
                'IsVolwassen' => true,
            ],
        ]);
    }
}
