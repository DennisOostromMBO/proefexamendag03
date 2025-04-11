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
}
