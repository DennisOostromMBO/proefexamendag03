<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReserveringSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('reservering')->insert([
            ['id' => 1, 'PersoonId' => 1, 'OpeningstijdId' => 2, 'BaanId' => 8, 'PakketOptieId' => 1, 'ReserveringStatus' => 'Bevestigd', 'Reserveringsnummer' => '202212200001', 'Datum' => '2022-12-20', 'AantalUren' => 1, 'BeginTijd' => '15:00', 'EindTijd' => '16:00', 'AantalVolwassen' => 4, 'AantalKinderen' => 2],
            ['id' => 2, 'PersoonId' => 2, 'OpeningstijdId' => 2, 'BaanId' => 3, 'PakketOptieId' => 3, 'ReserveringStatus' => 'Bevestigd', 'Reserveringsnummer' => '202212200002', 'Datum' => '2022-12-20', 'AantalUren' => 1, 'BeginTijd' => '17:00', 'EindTijd' => '18:00', 'AantalVolwassen' => 4, 'AantalKinderen' => null],
            ['id' => 3, 'PersoonId' => 3, 'OpeningstijdId' => 7, 'BaanId' => 1, 'PakketOptieId' => 1, 'ReserveringStatus' => 'Bevestigd', 'Reserveringsnummer' => '202212400003', 'Datum' => '2022-12-24', 'AantalUren' => 2, 'BeginTijd' => '16:00', 'EindTijd' => '18:00', 'AantalVolwassen' => 4, 'AantalKinderen' => null],
            ['id' => 4, 'PersoonId' => 1, 'OpeningstijdId' => 2, 'BaanId' => 6, 'PakketOptieId' => null, 'ReserveringStatus' => 'Bevestigd', 'Reserveringsnummer' => '202212700004', 'Datum' => '2022-12-27', 'AantalUren' => 1, 'BeginTijd' => '17:00', 'EindTijd' => '19:00', 'AantalVolwassen' => 2, 'AantalKinderen' => null],
            ['id' => 5, 'PersoonId' => 4, 'OpeningstijdId' => 3, 'BaanId' => 4, 'PakketOptieId' => 4, 'ReserveringStatus' => 'Bevestigd', 'Reserveringsnummer' => '202212800005', 'Datum' => '2022-12-28', 'AantalUren' => 1, 'BeginTijd' => '14:00', 'EindTijd' => '15:00', 'AantalVolwassen' => 3, 'AantalKinderen' => null],
            ['id' => 6, 'PersoonId' => 5, 'OpeningstijdId' => 10, 'BaanId' => 5, 'PakketOptieId' => 4, 'ReserveringStatus' => 'Bevestigd', 'Reserveringsnummer' => '202212800006', 'Datum' => '2022-12-28', 'AantalUren' => 2, 'BeginTijd' => '19:00', 'EindTijd' => '21:00', 'AantalVolwassen' => 2, 'AantalKinderen' => null],
        ]);
    }
}
