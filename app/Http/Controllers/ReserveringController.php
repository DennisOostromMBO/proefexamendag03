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
            // Get the 'reservering_id' filter from the request
            $reserveringId = $request->query('reservering_id'); 

            // Fetch all uitslagen using the stored procedure
            $uitslagen = collect(DB::select('CALL GetUitslagenByReservering(?)', [$reserveringId])); 
            $errorMessage = null;

            // Check if the result is empty
            if ($uitslagen->isEmpty()) {
                $errorMessage = 'Geen uitslagen gevonden voor deze reservering.';
            }

            // Return the view with the data
            return view('reservering.index', compact('uitslagen', 'reserveringId', 'errorMessage'));
        } catch (\Exception $e) {
            // Log the exception and return an error message
            return back()->withErrors(['message' => 'Er is een fout opgetreden bij het ophalen van de uitslagen.']);
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
}
