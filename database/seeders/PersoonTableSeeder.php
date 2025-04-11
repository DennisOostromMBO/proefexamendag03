<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersoonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('persoon')->insert([
            [
                'type_persoon' => 'Klant',
                'voornaam' => 'Mazin',
                'tussenvoegsel' => null,
                'achternaam' => 'Jamil',
                'roepnaam' => 'Mazin',
                'is_volwassen' => true,
            ],
            [
                'type_persoon' => 'Klant',
                'voornaam' => 'Arjan',
                'tussenvoegsel' => 'de',
                'achternaam' => 'Ruijter',
                'roepnaam' => 'Arjan',
                'is_volwassen' => true,
            ],
            [
                'type_persoon' => 'Klant',
                'voornaam' => 'Hans',
                'tussenvoegsel' => null,
                'achternaam' => 'Odijk',
                'roepnaam' => 'Hans',
                'is_volwassen' => true,
            ],
            [
                'type_persoon' => 'Klant',
                'voornaam' => 'Dennis',
                'tussenvoegsel' => 'van',
                'achternaam' => 'Wakeren',
                'roepnaam' => 'Dennis',
                'is_volwassen' => true,
            ],
            [
                'type_persoon' => 'Medewerker',
                'voornaam' => 'Wilco',
                'tussenvoegsel' => 'Van de',
                'achternaam' => 'Grift',
                'roepnaam' => 'Wilco',
                'is_volwassen' => true,
            ],
            [
                'type_persoon' => 'Gast',
                'voornaam' => 'Tom',
                'tussenvoegsel' => null,
                'achternaam' => 'Sanders',
                'roepnaam' => 'Tom',
                'is_volwassen' => false,
            ],
            [
                'type_persoon' => 'Gast',
                'voornaam' => 'Andrew',
                'tussenvoegsel' => null,
                'achternaam' => 'Sanders',
                'roepnaam' => 'Andrew',
                'is_volwassen' => false,
            ],
            [
                'type_persoon' => 'Gast',
                'voornaam' => 'Julian',
                'tussenvoegsel' => null,
                'achternaam' => 'Kaldenheuvel',
                'roepnaam' => 'Julian',
                'is_volwassen' => true,
            ],
        ]);
    }
}
