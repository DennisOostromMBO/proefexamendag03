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
        DB::table('persoon')->insert([
            ['id' => 1, 'TypePersoon' => 'Klant', 'Voornaam' => 'Mazin', 'Tussenvoegsel' => null, 'Achternaam' => 'Jamil', 'Roepnaam' => 'Mazin', 'IsVolwassen' => 1],
            ['id' => 2, 'TypePersoon' => 'Klant', 'Voornaam' => 'Arjan', 'Tussenvoegsel' => 'de', 'Achternaam' => 'Ruijter', 'Roepnaam' => 'Arjan', 'IsVolwassen' => 1],
            ['id' => 3, 'TypePersoon' => 'Klant', 'Voornaam' => 'Hans', 'Tussenvoegsel' => null, 'Achternaam' => 'Odijk', 'Roepnaam' => 'Hans', 'IsVolwassen' => 1],
            ['id' => 4, 'TypePersoon' => 'Klant', 'Voornaam' => 'Dennis', 'Tussenvoegsel' => 'van', 'Achternaam' => 'Wakeren', 'Roepnaam' => 'Dennis', 'IsVolwassen' => 1],
            ['id' => 5, 'TypePersoon' => 'Medewerker', 'Voornaam' => 'Wilco', 'Tussenvoegsel' => 'Van de', 'Achternaam' => 'Grift', 'Roepnaam' => 'Wilco', 'IsVolwassen' => 1],
            ['id' => 6, 'TypePersoon' => 'Gast', 'Voornaam' => 'Tom', 'Tussenvoegsel' => null, 'Achternaam' => 'Sanders', 'Roepnaam' => 'Tom', 'IsVolwassen' => 0],
            ['id' => 7, 'TypePersoon' => 'Gast', 'Voornaam' => 'Andrew', 'Tussenvoegsel' => null, 'Achternaam' => 'Sanders', 'Roepnaam' => 'Andrew', 'IsVolwassen' => 0],
            ['id' => 8, 'TypePersoon' => 'Gast', 'Voornaam' => 'Julian', 'Tussenvoegsel' => null, 'Achternaam' => 'Kaldenheuvel', 'Roepnaam' => 'Julian', 'IsVolwassen' => 1],
        ]);
    }
}
    {
        $personen = [
            [1, 'Mazin', null, 'Jamil', 'Mazin', true],
            [1, 'Arjan', 'de', 'Ruijter', 'Arjan', true],
            [1, 'Hans', null, 'Odijk', 'Hans', true],
            [1, 'Dennis', 'van', 'Wakeren', 'Dennis', true],
            [2, 'Wilco', 'Van de', 'Grift', 'Wilco', true],
            [3, 'Tom', null, 'Sanders', 'Tom', false],
            [3, 'Andrew', null, 'Sanders', 'Andrew', false],
            [3, 'Julian', null, 'Kaldenheuvel', 'Julian', true],
        ];

        foreach ($personen as [$typeId, $voor, $tussen, $achter, $roep, $volwassen]) {
            DB::table('persoons')->insert([
                'type_persoon_id' => $typeId,
                'voornaam' => $voor,
                'tussenvoegsel' => $tussen,
                'achternaam' => $achter,
                'roepnaam' => $roep,
                'is_volwassen' => $volwassen,
            ]);
        }
    }


