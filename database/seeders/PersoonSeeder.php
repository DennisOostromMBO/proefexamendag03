<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersoonSeeder extends Seeder
{
    public function run(): void
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
}