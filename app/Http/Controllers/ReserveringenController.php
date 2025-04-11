<?php


//Dennis
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReserveringenController extends Controller
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

    /**
     * Show the form for editing the baan_id of a reservering.
     */
    public function edit($id)
    {
        $reservering = DB::table('reserveringen')->where('id', $id)->first();
        $banen = DB::table('baan')->get();

        return view('reserveringen.edit', compact('reservering', 'banen'));
    }

    /**
     * Update the baan_id of a reservering.
     */
    public function update(Request $request, $id)
    {
        try {
            // Fetch the reservering to check for children
            $reservering = DB::table('reserveringen')->where('id', $id)->first();

            // Check if the baan is unsuitable for children and the reservering includes children
            if ($reservering->aantal_kinderen > 0 && !$this->baanHeeftHek($request->input('baan_id'))) {
                return back()->withErrors(['message' => 'Deze baan is ongeschikt voor kinderen omdat deze geen hekjes heeft.']);
            }

            // Call the stored procedure with parameters
            DB::statement('CALL WijzigBaan(?, ?)', [$id, $request->input('baan_id')]);

            // Redirect back to the banen index with a success message
            return redirect()->route('banen.index')->with('success', 'Het baannummer is succesvol gewijzigd.');
        } catch (\Exception $e) {
            // Extract the error message from the exception
            $errorMessage = $e->getMessage();

            // Return to the edit view with the formatted error message
            return back()->withErrors(['message' => $errorMessage]);
        }
    }

    /**
     * Check if a baan has a hek.
     */
    private function baanHeeftHek($baanId)
    {
        $baan = DB::table('baan')->where('id', $baanId)->first();
        return $baan && $baan->heeft_hek;
    }
}
