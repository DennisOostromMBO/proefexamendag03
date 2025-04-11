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
    public function index(Request $request)
    {
        $datums = DB::table('persoons')
            ->selectRaw('DATE(DatumAangemaakt) as datum')
            ->distinct()
            ->orderBy('datum', 'asc')
            ->pluck('datum')
            ->toArray();

        $query = DB::table('persoons')
            ->leftJoin('contacts', 'persoons.id', '=', 'contacts.PersoonId')
            ->select(
                'persoons.id', // Include the id field
                'persoons.Voornaam',
                'persoons.Tussenvoegsel',
                'persoons.Achternaam',
                'persoons.Roepnaam',
                'persoons.IsVolwassen',
                'persoons.DatumAangemaakt',
                'contacts.Mobiel',
                'contacts.Email'
            );

        if ($request->has('datum') && $request->input('datum') !== 'all') {
            $query->whereDate('persoons.DatumAangemaakt', '=', $request->input('datum'));
        }

        $klanten = $query->orderBy('persoons.Achternaam', 'asc')->get();

        $noData = $klanten->isEmpty();

        return view('contact.index', [
            'klanten' => $klanten,
            'datums' => $datums,
            'noData' => $noData,
        ]);
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
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $klant = DB::table('persoons')
            ->leftJoin('contacts', 'persoons.id', '=', 'contacts.PersoonId')
            ->select(
                'persoons.id',
                'persoons.Voornaam',
                'persoons.Tussenvoegsel',
                'persoons.Achternaam',
                'persoons.Roepnaam',
                'persoons.IsVolwassen',
                'contacts.Mobiel',
                'contacts.Email'
            )
            ->where('persoons.id', $id)
            ->first();

        if (!$klant) {
            abort(404, 'Klant niet gevonden.');
        }

        return view('contact.edit', ['klant' => $klant]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Voornaam' => 'required|string|max:51',
            'Tussenvoegsel' => 'nullable|string|max:20',
            'Achternaam' => 'required|string|max:41',
            'Roepnaam' => 'nullable|string|max:50', // Ensure Roepnaam is optional
            'IsVolwassen' => 'nullable|boolean',
            'Mobiel' => 'nullable|string|max:255',
            'Email' => 'nullable|email|max:255|unique:contacts,Email,' . $id . ',PersoonId',
        ]);

        // Split the validated data into 'persoons' and 'contacts' fields
        $persoonData = [
            'Voornaam' => $validatedData['Voornaam'],
            'Tussenvoegsel' => $validatedData['Tussenvoegsel'] ?? null,
            'Achternaam' => $validatedData['Achternaam'],
            'Roepnaam' => $validatedData['Roepnaam'] ?? null, // Default to null if not provided
            'IsVolwassen' => $validatedData['IsVolwassen'] ?? false,
        ];

        $contactData = [
            'Mobiel' => $validatedData['Mobiel'] ?? null,
            'Email' => $validatedData['Email'] ?? null,
        ];

        // Update the 'persoons' table
        DB::table('persoons')->where('id', $id)->update($persoonData);

        // Update the 'contacts' table
        DB::table('contacts')->where('PersoonId', $id)->update($contactData);

        return redirect()->route('klanten.index')->with('success', 'Klantgegevens succesvol bijgewerkt.');
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
