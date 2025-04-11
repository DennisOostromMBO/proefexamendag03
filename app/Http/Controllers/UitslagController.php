<?php

namespace App\Http\Controllers;

use App\Models\Uitslag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UitslagController extends Controller
{
    /**
     * Display the list of uitslagen.
     */
    public function index()
    {
        try {
            // Fetch uitslagen data with additional fields
            $uitslagen = DB::table('uitslag')
                ->join('spel', 'uitslag.SpelId', '=', 'spel.id')
                ->join('persoon', 'spel.PersoonId', '=', 'persoon.id')
                ->join('reservering', 'spel.ReserveringId', '=', 'reservering.id')
                ->select(
                    'uitslag.id AS UitslagId',
                    'uitslag.SpelId',
                    'uitslag.Aantalpunten',
                    DB::raw("CONCAT(persoon.Voornaam, ' ', IFNULL(persoon.Tussenvoegsel, ''), ' ', persoon.Achternaam) AS Naam"),
                    'reservering.datum AS Datum',
                    'reservering.aantal_uren AS AantalUren',
                    'reservering.begin_tijd AS BeginTijd',
                    'reservering.eind_tijd AS EindTijd',
                    'reservering.aantal_volwassen AS AantalVolwassen',
                    'reservering.aantal_kinderen AS AantalKinderen'
                )
                ->orderBy('uitslag.Aantalpunten', 'DESC')
                ->get();

            // Pass the data to the view
            return view('uitslag.index', compact('uitslagen'));
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Er is een fout opgetreden bij het ophalen van de uitslagen.']);
        }
    }

    /**
     * Show the form for editing a specific uitslag.
     */
    public function editUitslag($id)
    {
        try {
            $uitslag = DB::table('uitslag')
                ->join('spel', 'uitslag.SpelId', '=', 'spel.id')
                ->join('persoon', 'spel.PersoonId', '=', 'persoon.id')
                ->select(
                    'uitslag.id AS UitslagId',
                    'uitslag.SpelId',
                    'uitslag.Aantalpunten',
                    DB::raw("CONCAT(persoon.Voornaam, ' ', IFNULL(persoon.Tussenvoegsel, ''), ' ', persoon.Achternaam) AS Naam")
                )
                ->where('uitslag.id', $id)
                ->first();

            if (!$uitslag) {
                return back()->withErrors(['message' => 'De geselecteerde uitslag bestaat niet.']);
            }

            return view('uitslag.edit', compact('uitslag'));
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Er is een fout opgetreden bij het ophalen van de uitslag.']);
        }
    }

    /**
     * Update a specific uitslag.
     */
    public function updateUitslag(Request $request, $id)
    {
        $request->validate([
            'Aantalpunten' => 'required|integer|max:300',
        ], [
            'Aantalpunten.max' => 'Het aantal punten is niet geldig, voer een waarde in kleiner of gelijk aan 300.',
        ]);

        try {
            // Update the uitslag
            $updated = DB::table('uitslag')
                ->where('id', $id)
                ->update(['Aantalpunten' => $request->input('Aantalpunten')]);

            if ($updated) {
                // Get the ReserveringId for the updated uitslag
                $reserveringId = DB::table('spel')
                    ->join('uitslag', 'spel.id', '=', 'uitslag.SpelId')
                    ->where('uitslag.id', $id)
                    ->value('spel.ReserveringId');

                // Redirect to the reservering.uitslagen route
                return redirect()->route('reservering.uitslagen', ['id' => $reserveringId])
                    ->with('success', 'Aantal punten is gewijzigd.');
            }

            return back()->withErrors(['message' => 'Er is een fout opgetreden bij het wijzigen van de uitslag.']);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Er is een fout opgetreden bij het wijzigen van de uitslag.']);
        }
    }

    /**
     * Display the uitslagen for a specific reservering.
     */
    public function showUitslagen($id)
    {
        try {
            $uitslagen = DB::table('uitslag')
                ->join('spel', 'uitslag.SpelId', '=', 'spel.id')
                ->join('persoon', 'spel.PersoonId', '=', 'persoon.id')
                ->select(
                    'uitslag.id AS UitslagId',
                    'uitslag.SpelId',
                    'uitslag.Aantalpunten',
                    DB::raw("CONCAT(persoon.Voornaam, ' ', IFNULL(persoon.Tussenvoegsel, ''), ' ', persoon.Achternaam) AS Naam")
                )
                ->where('spel.ReserveringId', $id)
                ->orderBy('uitslag.Aantalpunten', 'DESC')
                ->get();

            return view('uitslag.uitslagen', compact('uitslagen'));
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Er is een fout opgetreden bij het ophalen van de uitslagen.']);
        }
    }
}
