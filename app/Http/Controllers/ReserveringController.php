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
        // Get the reservering ID from the request (if provided)
        $reserveringId = $request->query('reservering_id');

        if ($reserveringId) {
            // Call the stored procedure to get the uitslagen for the specific reservering
            $uitslagen = DB::select('CALL GetUitslagenByReservering(?)', [$reserveringId]);

            // Return the view with the uitslagen data
            return view('reservering.uitslagen', compact('uitslagen'));
        }

        // If no reservering ID is provided, return a default view or message
        return view('reservering.index');
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
