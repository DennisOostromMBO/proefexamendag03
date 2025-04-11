<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReserveringController extends Controller
{
    /**
     * Display a listing of the reserveringen.
     */
    public function index(Request $request)
    {
        try {
            // Get the 'from_date' filter from the request
            $fromDate = $request->input('from_date'); 
            
            // Fetch all reserveringen using the stored procedure
            $reserveringen = collect(DB::select('CALL GetAllReserveringen()')); 
            $errorMessage = null;

            // Apply filtering if 'from_date' is provided
            if ($fromDate) {
                $filteredReserveringen = $reserveringen
                    ->filter(fn($r) => $r->datum >= $fromDate)
                    ->sortByDesc('datum')
                    ->values();

                // Check if the filtered result is empty
                if ($filteredReserveringen->isEmpty()) {
                    $errorMessage = 'Er is geen informatie over deze periode';
                    $reserveringen = collect(); // Pass an empty collection
                } else {
                    $reserveringen = $filteredReserveringen;
                }
            }

            // Return the view with the data
            return view('reserveringen.index', compact('reserveringen', 'fromDate', 'errorMessage'));
        } catch (\Exception $e) {
            // Log the exception and return an error message
            return back()->withErrors(['message' => 'Er is een fout opgetreden bij het ophalen van de reserveringen.']);
        }
    }
}
