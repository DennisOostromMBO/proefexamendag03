<?php

namespace Database\Seeders;

use App\Models\Persoon;
use App\Models\Baan;
use App\Models\OpeningsTijd;
use App\Models\PakketOptie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReserveringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get IDs to use in the reservations
        $personen = Persoon::where('type_persoon_id', 1)->pluck('id')->toArray(); // Klanten
        $banen = Baan::pluck('id')->toArray();
        $openingsTijden = OpeningsTijd::pluck('id')->toArray();
        $pakketOpties = PakketOptie::pluck('id')->toArray();

        $reserveringen = [
            // Bevestigde reserveringen in het verleden
            [
                'persoon_id' => $personen[0],
                'openingstijd_id' => $openingsTijden[0],
                'baan_id' => $banen[0],
                'pakketoptie_id' => $pakketOpties[0],
                'reservering_status' => 'Bevestigd',
                'reserveringsnummer' => 'RES-2025-0001',
                'datum' => '2025-03-15',
                'aantal_uren' => 2,
                'begin_tijd' => '15:00:00',
                'eind_tijd' => '17:00:00',
                'aantal_volwassen' => 4,
                'aantal_kinderen' => 0,
            ],
            [
                'persoon_id' => $personen[1],
                'openingstijd_id' => $openingsTijden[1],
                'baan_id' => $banen[1],
                'pakketoptie_id' => $pakketOpties[1],
                'reservering_status' => 'Bevestigd',
                'reserveringsnummer' => 'RES-2025-0002',
                'datum' => '2025-03-30',
                'aantal_uren' => 3,
                'begin_tijd' => '18:00:00',
                'eind_tijd' => '21:00:00',
                'aantal_volwassen' => 2,
                'aantal_kinderen' => 3,
            ],

            // Bevestigde reserveringen in het heden
            [
                'persoon_id' => $personen[2],
                'openingstijd_id' => $openingsTijden[2],
                'baan_id' => $banen[2],
                'pakketoptie_id' => $pakketOpties[2],
                'reservering_status' => 'Bevestigd',
                'reserveringsnummer' => 'RES-2025-0003',
                'datum' => '2025-04-10',
                'aantal_uren' => 1,
                'begin_tijd' => '16:00:00',
                'eind_tijd' => '17:00:00',
                'aantal_volwassen' => 6,
                'aantal_kinderen' => 0,
            ],

            // Bevestigde reserveringen in de toekomst
            [
                'persoon_id' => $personen[3],
                'openingstijd_id' => $openingsTijden[3],
                'baan_id' => $banen[3],
                'pakketoptie_id' => $pakketOpties[3],
                'reservering_status' => 'Bevestigd',
                'reserveringsnummer' => 'RES-2025-0004',
                'datum' => '2025-04-20',
                'aantal_uren' => 2,
                'begin_tijd' => '19:00:00',
                'eind_tijd' => '21:00:00',
                'aantal_volwassen' => 3,
                'aantal_kinderen' => 2,
            ],

            // Niet-bevestigde reservering (zal niet zichtbaar zijn in het overzicht)
            [
                'persoon_id' => $personen[0],
                'openingstijd_id' => $openingsTijden[4],
                'baan_id' => $banen[4],
                'pakketoptie_id' => null,
                'reservering_status' => 'Optioneel',
                'reserveringsnummer' => 'RES-2025-0005',
                'datum' => '2025-04-15',
                'aantal_uren' => 2,
                'begin_tijd' => '14:00:00',
                'eind_tijd' => '16:00:00',
                'aantal_volwassen' => 2,
                'aantal_kinderen' => 0,
            ],
        ];

        foreach ($reserveringen as $reservering) {
            DB::table('reserveringen')->insert($reservering);
        }
    }
}
