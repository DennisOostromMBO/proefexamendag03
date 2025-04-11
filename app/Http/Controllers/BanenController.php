<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class BanenController extends Controller
{
    /**
     * Display a listing of the banen.
     */
    public function index()
    {
        try {
            // Fetch data from the GetAllBanen stored procedure
            $banen = DB::select('CALL GetAllBanen()'); // Ensure the SP name matches the updated one
            return view('banen.index', compact('banen'));
        } catch (\Exception $e) {
            // Log the exception and return an error message
            return back()->withErrors(['message' => 'Er is een fout opgetreden bij het ophalen van de banen.']);
        }
    }
}
