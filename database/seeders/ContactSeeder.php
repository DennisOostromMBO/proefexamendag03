<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'id' => 1,
                'PersoonId' => 1,
                'Mobiel' => '0612365478',
                'Email' => 'm.jamil@gmail.com',
            ],
            [
                'id' => 2,
                'PersoonId' => 2,
                'Mobiel' => '0637264532',
                'Email' => 'a.ruijter@gmail.com',
            ],
            [
                'id' => 3,
                'PersoonId' => 3,
                'Mobiel' => '0639451238',
                'Email' => 'h.odijk@gmail.com',
            ],
            [
                'id' => 4,
                'PersoonId' => 4,
                'Mobiel' => '0693234612',
                'Email' => 'd.van.wakeren@gmail.com',
            ],
            [
                'id' => 5,
                'PersoonId' => 5,
                'Mobiel' => '0693234694',
                'Email' => 'w.van.de.grift@gmail.com',
            ],
        ]);
    }
}
