<?php

namespace App\Http\Controllers;

use App\Models\Persoon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersoonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klanten = DB::table('persoons')
            ->join('contacts', 'persoons.id', '=', 'contacts.PersoonId')
            ->select('persoons.Voornaam', 'persoons.Tussenvoegsel', 'persoons.Achternaam', 'persoons.IsVolwassen', 'contacts.Mobiel', 'contacts.Email')
            ->get();

        return view('contact.index', ['klanten' => $klanten]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_persoon' => 'required|integer',
            'Voornaam' => 'required|string|max:51',
            'Tussenvoegsel' => 'nullable|string|max:20',
            'Achternaam' => 'required|string|max:41',
            'Roepnaam' => 'required|string|max:50',
            'IsVolwassen' => 'required|boolean',
        ]);

        $persoon = Persoon::create($validated);
        return response()->json($persoon, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $persoon = Persoon::findOrFail($id);
        return response()->json($persoon);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'type_persoon' => 'sometimes|integer',
            'Voornaam' => 'sometimes|string|max:51',
            'Tussenvoegsel' => 'nullable|string|max:20',
            'Achternaam' => 'sometimes|string|max:41',
            'Roepnaam' => 'sometimes|string|max:50',
            'IsVolwassen' => 'sometimes|boolean',
        ]);

        $persoon = Persoon::findOrFail($id);
        $persoon->update($validated);
        return response()->json($persoon);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $persoon = Persoon::findOrFail($id);
        $persoon->delete();
        return response()->json(null, 204);
    }
}
