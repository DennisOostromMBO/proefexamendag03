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
            PakketOptieSeeder::class,
            OpeningsTijdSeeder::class,
            BaanSeeder::class,
            PersoonSeeder::class,
            ReserveringStatusSeeder::class,
            ReserveringSeeder::class,
            ContactSeeder::class,
            SpelSeeder::class,
            UitslagSeeder::class,
        ]);
    }
}
