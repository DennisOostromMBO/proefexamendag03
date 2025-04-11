<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpeningsTijdSeeder extends Seeder
{
    public function run(): void
    {
        $openingsTijden = [
            ['Maandag', '14:00:00', '22:00:00'],
            ['Dinsdag', '14:00:00', '22:00:00'],
            ['Woensdag', '14:00:00', '22:00:00'],
            ['Donderdag', '14:00:00', '22:00:00'],
            ['Vrijdagmiddag', '14:00:00', '18:00:00'],
            ['Vrijdagavond', '18:00:00', '24:00:00'],
            ['Zaterdagmiddag', '14:00:00', '18:00:00'],
            ['Zaterdagavond', '18:00:00', '24:00:00'],
            ['Zondagmiddag', '14:00:00', '18:00:00'],
            ['Zondagavond', '18:00:00', '24:00:00'],
        ];

        foreach ($openingsTijden as [$dag, $start, $eind]) {
            DB::table('openings_tijds')->insert([
                'dag_naam' => $dag,
                'begin_tijd' => $start,
                'eind_tijd' => $eind,
            ]);
        }
    }
}