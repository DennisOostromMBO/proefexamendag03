<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use stdClass;

class DatabaseService
{
    /**
     * Get all confirmed reservations up to a specific date using stored procedure
     */
    public function getConfirmedReservations($cutoffDate)
    {
        // We'll use raw SQL query since the stored procedure might be referencing the old table name
        $results = DB::select("
            SELECT
                r.id,
                r.persoon_id,
                r.openingstijd_id,
                r.baan_id,
                r.pakketoptie_id,
                r.reservering_status,
                r.reserveringsnummer,
                r.datum,
                r.aantal_uren,
                r.begin_tijd,
                r.eind_tijd,
                r.aantal_volwassen,
                r.aantal_kinderen,
                r.datum_aangemaakt,
                r.datum_gewijzigd,
                p.voornaam,
                p.tussenvoegsel,
                p.achternaam,
                po.naam AS pakketoptie_naam,
                b.nummer AS baan_nummer
            FROM
                reserveringen r
            INNER JOIN persoons p ON r.persoon_id = p.id
            INNER JOIN baans b ON r.baan_id = b.id
            LEFT JOIN pakket_opties po ON r.pakketoptie_id = po.id
            WHERE
                r.reservering_status = 'Bevestigd'
                AND r.datum <= ?
            ORDER BY
                r.datum DESC
        ", [$cutoffDate]);

        // Add helper methods to the returned objects
        return collect($results)->map(function ($item) {
            // Add fullName attribute
            $item->fullName = trim($item->voornaam . ' ' . ($item->tussenvoegsel ? $item->tussenvoegsel . ' ' : '') . $item->achternaam);
            return $item;
        });
    }

    /**
     * Get a single reservation details using stored procedure
     */
    public function getReservationDetails($reservationId)
    {
        // Use direct SQL query to ensure we're using the correct table name
        $results = DB::select("
            SELECT
                r.id,
                r.persoon_id,
                r.openingstijd_id,
                r.baan_id,
                r.pakketoptie_id,
                r.reservering_status,
                r.reserveringsnummer,
                r.datum,
                r.aantal_uren,
                r.begin_tijd,
                r.eind_tijd,
                r.aantal_volwassen,
                r.aantal_kinderen,
                r.datum_aangemaakt,
                r.datum_gewijzigd,
                p.voornaam,
                p.tussenvoegsel,
                p.achternaam,
                p.roepnaam
            FROM
                reserveringen r
            INNER JOIN persoons p ON r.persoon_id = p.id
            WHERE
                r.id = ?
        ", [$reservationId]);

        if (empty($results)) {
            return null;
        }

        $reservation = $results[0];

        // Add fullName attribute
        $reservation->fullName = trim($reservation->voornaam . ' ' .
            ($reservation->tussenvoegsel ? $reservation->tussenvoegsel . ' ' : '') .
            $reservation->achternaam);

        return $reservation;
    }

    /**
     * Get all active package options using stored procedure
     */
    public function getAllPakketOpties()
    {
        return DB::select("
            SELECT
                id,
                naam,
                is_active,
                opmerking,
                datum_aangemaakt,
                datum_gewijzigd
            FROM
                pakket_opties
            WHERE
                is_active = 1
            ORDER BY
                naam
        ");
    }

    /**
     * Update a reservation's package option using stored procedure
     */
    public function updateReservationPackage($reservationId, $pakketOptieId)
    {
        // For stored procedures with OUT parameters, we can use direct SQL
        // Check if reservation has children
        $reservation = DB::selectOne("
            SELECT aantal_kinderen > 0 AS has_children
            FROM reserveringen
            WHERE id = ?
        ", [$reservationId]);

        $hasChildren = $reservation->has_children ?? false;

        // If package is set, check if it's appropriate for children
        if ($pakketOptieId) {
            $pakketOptie = DB::selectOne("
                SELECT naam
                FROM pakket_opties
                WHERE id = ?
            ", [$pakketOptieId]);

            if ($pakketOptie->naam === 'Vrijgezellenfeest' && $hasChildren) {
                return [
                    'success' => false,
                    'message' => 'Het optiepakket vrijgezellenfeest is niet bedoelt voor kinderen'
                ];
            } else {
                // Update the package option
                DB::update("
                    UPDATE reserveringen
                    SET pakketoptie_id = ?,
                        datum_gewijzigd = CURRENT_TIMESTAMP
                    WHERE id = ?
                ", [$pakketOptieId, $reservationId]);

                return [
                    'success' => true,
                    'message' => 'Het optiepakket is gewijzigd'
                ];
            }
        } else {
            // Update with NULL (no package)
            DB::update("
                UPDATE reserveringen
                SET pakketoptie_id = NULL,
                    datum_gewijzigd = CURRENT_TIMESTAMP
                WHERE id = ?
            ", [$reservationId]);

            return [
                'success' => true,
                'message' => 'Het optiepakket is verwijderd'
            ];
        }
    }
}
