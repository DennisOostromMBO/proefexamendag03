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
        $request->validate([
            'datum' => 'nullable|date|before_or_equal:today',
        ]);

        $datums = DB::table('persoons')
            ->selectRaw('DATE(datum_aangemaakt) as datum')
            ->distinct()
            ->orderBy('datum', 'asc')
            ->pluck('datum')
            ->toArray();

        $query = DB::table('persoons')
            ->leftJoin('contacts', 'persoons.id', '=', 'contacts.PersoonId')
            ->select(
                'persoons.id',
                'persoons.Voornaam',
                'persoons.Tussenvoegsel',
                'persoons.Achternaam',
                'persoons.Roepnaam',
                'persoons.is_volwassen',
                'persoons.datum_aangemaakt',
                'contacts.Mobiel',
                'contacts.Email'
            );

        if ($request->has('datum') && $request->input('datum') !== 'all') {
            $query->whereDate('persoons.datum_aangemaakt', '=', $request->input('datum'));
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
            'type_persoon' => 'required|integer|exists:type_persoons,id',
            'Voornaam' => 'required|string|max:51|regex:/^[a-zA-Z]+$/',
            'Tussenvoegsel' => 'nullable|string|max:20|regex:/^[a-zA-Z\s]+$/',
            'Achternaam' => 'required|string|max:41|regex:/^[a-zA-Z]+$/',
            'Roepnaam' => 'required|string|max:50|regex:/^[a-zA-Z]+$/',
            'is_volwassen' => 'required|boolean',
        ], [
            'regex' => 'Dit is niet toegestaan',
        ]);

        $persoon = Persoon::create($validated);
        return response()->json($persoon, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $validatedId = filter_var($id, FILTER_VALIDATE_INT);
        if (!$validatedId) {
            abort(400, 'Invalid ID provided.');
        }

        $persoon = Persoon::findOrFail($validatedId);
        return response()->json($persoon);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $validatedId = filter_var($id, FILTER_VALIDATE_INT);
        if (!$validatedId) {
            abort(400, 'Invalid ID provided.');
        }

        $klant = DB::table('persoons')
            ->leftJoin('contacts', 'persoons.id', '=', 'contacts.PersoonId')
            ->select(
                'persoons.id',
                'persoons.Voornaam',
                'persoons.Tussenvoegsel',
                'persoons.Achternaam',
                'persoons.Roepnaam',
                'persoons.is_volwassen',
                'contacts.Mobiel',
                'contacts.Email'
            )
            ->where('persoons.id', $validatedId)
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
        $validatedId = filter_var($id, FILTER_VALIDATE_INT);
        if (!$validatedId) {
            abort(400, 'Invalid ID provided.');
        }

        $validatedData = $request->validate([
            'Voornaam' => 'required|string|max:51|regex:/^[a-zA-Z]+$/',
            'Tussenvoegsel' => 'nullable|string|max:20|regex:/^[a-zA-Z\s]+$/',
            'Achternaam' => 'required|string|max:41|regex:/^[a-zA-Z]+$/',
            'Roepnaam' => 'nullable|string|max:50|regex:/^[a-zA-Z]+$/',
            'is_volwassen' => 'nullable|boolean',
            'Mobiel' => 'nullable|string|max:255',
            'Email' => 'nullable|email|max:255|unique:contacts,Email,' . $validatedId . ',PersoonId',
        ], [
            'regex' => 'Dit is niet toegestaan',
        ]);

        $persoonData = [
            'Voornaam' => $validatedData['Voornaam'],
            'Tussenvoegsel' => $validatedData['Tussenvoegsel'] ?? null,
            'Achternaam' => $validatedData['Achternaam'],
            'Roepnaam' => $validatedData['Roepnaam'] ?? $validatedData['Voornaam'],
            'is_volwassen' => $validatedData['is_volwassen'], // Checkbox value is handled correctly
        ];

        $contactData = [
            'Mobiel' => $validatedData['Mobiel'] ?? null,
            'Email' => $validatedData['Email'] ?? null,
        ];

        DB::table('persoons')->where('id', $validatedId)->update($persoonData);
        DB::table('contacts')->where('PersoonId', $validatedId)->update($contactData);

        return redirect()->route('klanten.index')->with('success', 'Klantgegevens succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $validatedId = filter_var($id, FILTER_VALIDATE_INT);
        if (!$validatedId) {
            abort(400, 'Invalid ID provided.');
        }

        $persoon = Persoon::findOrFail($validatedId);
        $persoon->delete();

        return response()->json(null, 204);
    }
}
