<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TypePersoonSeeder::class,
            ContactSeeder::class,
            PakketOptieSeeder::class,
            OpeningsTijdSeeder::class,
            BaanSeeder::class,
            PersoonSeeder::class,
            ReserveringStatusSeeder::class,
            ReserveringSeeder::class,

        ]);

        $this->call([
            PersoonSeeder::class,
            ReserveringSeeder::class,
            SpelSeeder::class,
            UitslagSeeder::class,
        ]);
    }
}
