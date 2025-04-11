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
        $results = DB::select('CALL GetConfirmedReservations(?)', [$cutoffDate]);
        
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
        $results = DB::select('CALL GetReservationDetails(?)', [$reservationId]);
        
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
        return DB::select('CALL GetAllPakketOpties()');
    }
    
    /**
     * Update a reservation's package option using stored procedure
     */
    public function updateReservationPackage($reservationId, $pakketOptieId)
    {
        // For stored procedures with OUT parameters, we need to use statement binding
        $resultMessage = '';
        
        $statement = DB::statement(
            'CALL UpdateReservationPackage(?, ?, @result_message)',
            [$reservationId, $pakketOptieId]
        );
        
        $result = DB::select('SELECT @result_message as message')[0];
        
        return [
            'success' => str_starts_with($result->message, 'SUCCESS'),
            'message' => str_replace('SUCCESS: ', '', str_replace('ERROR: ', '', $result->message))
        ];
    }
}