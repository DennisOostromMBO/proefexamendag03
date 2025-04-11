<?php

namespace App\Http\Controllers;

use App\Models\Reservering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReserveringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // Fetch all reserveringen with related data
            $reserveringen = DB::table('reservering')
                ->join('persoon', 'reservering.PersoonId', '=', 'persoon.id')
                ->select(
                    'reservering.id AS ReserveringId',
                    DB::raw("CONCAT(persoon.Voornaam, ' ', IFNULL(persoon.Tussenvoegsel, ''), ' ', persoon.Achternaam) AS Naam"),
                    'reservering.Datum',
                    'reservering.AantalUren',
                    'reservering.BeginTijd',
                    'reservering.EindTijd',
                    'reservering.AantalVolwassen',
                    'reservering.AantalKinderen'
                )
                ->orderBy('reservering.Datum', 'DESC')
                ->get();

            return view('uitslag.index', compact('reserveringen'));
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Er is een fout opgetreden bij het ophalen van de reserveringen.']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservering $reservering)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservering $reservering)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservering $reservering)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservering $reservering)
    {
        //
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
}
