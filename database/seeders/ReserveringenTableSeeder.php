<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReserveringenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reserveringen')->insert([
            [
                'persoon_id' => 1,
                'openingstijd_id' => 2,
                'baan_id' => 8,
                'pakketoptie_id' => 1,
                'reservering_status' => 'Bevestigd',
                'reserveringsnummer' => '202212200001',
                'datum' => '2022-12-20',
                'aantal_uren' => 1,
                'begin_tijd' => '15:00',
                'eind_tijd' => '16:00',
                'aantal_volwassen' => 4,
                'aantal_kinderen' => 2,
            ],
            [
                'persoon_id' => 2,
                'openingstijd_id' => 2,
                'baan_id' => 2,
                'pakketoptie_id' => 3,
                'reservering_status' => 'Bevestigd',
                'reserveringsnummer' => '202212200002',
                'datum' => '2022-12-20',
                'aantal_uren' => 1,
                'begin_tijd' => '17:00',
                'eind_tijd' => '18:00',
                'aantal_volwassen' => 4,
                'aantal_kinderen' => null,
            ],
            [
                'persoon_id' => 3,
                'openingstijd_id' => 7,
                'baan_id' => 3,
                'pakketoptie_id' => 1,
                'reservering_status' => 'Bevestigd',
                'reserveringsnummer' => '202212240003',
                'datum' => '2022-12-24',
                'aantal_uren' => 2,
                'begin_tijd' => '16:00',
                'eind_tijd' => '18:00',
                'aantal_volwassen' => 4,
                'aantal_kinderen' => null,
            ],
            [
                'persoon_id' => 1,
                'openingstijd_id' => 2,
                'baan_id' => 6,
                'pakketoptie_id' => null,
                'reservering_status' => 'Bevestigd',
                'reserveringsnummer' => '202212270004',
                'datum' => '2022-12-27',
                'aantal_uren' => 2,
                'begin_tijd' => '17:00',
                'eind_tijd' => '19:00',
                'aantal_volwassen' => 2,
                'aantal_kinderen' => null,
            ],
            [
                'persoon_id' => 4,
                'openingstijd_id' => 3,
                'baan_id' => 4,
                'pakketoptie_id' => 4,
                'reservering_status' => 'Bevestigd',
                'reserveringsnummer' => '202212280005',
                'datum' => '2022-12-28',
                'aantal_uren' => 1,
                'begin_tijd' => '14:00',
                'eind_tijd' => '15:00',
                'aantal_volwassen' => 3,
                'aantal_kinderen' => null,
            ],
            [
                'persoon_id' => 5,
                'openingstijd_id' => 10,
                'baan_id' => 5,
                'pakketoptie_id' => 4,
                'reservering_status' => 'Bevestigd',
                'reserveringsnummer' => '202212280006',
                'datum' => '2022-12-28',
                'aantal_uren' => 2,
                'begin_tijd' => '19:00',
                'eind_tijd' => '21:00',
                'aantal_volwassen' => 2,
                'aantal_kinderen' => null,
            ],
        ]);
    }
}
