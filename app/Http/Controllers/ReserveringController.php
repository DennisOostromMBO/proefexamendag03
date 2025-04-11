<?php

namespace App\Http\Controllers;

use App\Services\DatabaseService;
use Illuminate\Http\Request;

class ReserveringController extends Controller
{
    protected $databaseService;

    public function __construct(DatabaseService $databaseService)
    {
        $this->databaseService = $databaseService;
    }

    /**
     * Display the overview page for reservations.
     */
    public function index(Request $request)
    {
        $datum = $request->input('datum', now()->format('Y-m-d'));

        $reserveringen = $this->databaseService->getConfirmedReservations($datum);

        $hasResults = count($reserveringen) > 0;

        return view('reservering.index', compact('reserveringen', 'datum', 'hasResults'));
    }

    /**
     * Show the confirmed reservations for a specific date.
     */
    public function getBevestigdeReservering(Request $request)
    {
        $request->validate([
            'datum' => 'required|date',
        ]);

        $datum = $request->datum;

        $reserveringen = $this->databaseService->getConfirmedReservations($datum);

        if (count($reserveringen) === 0) {
            return back()->with('error', 'Er is geen reserveringsinformatie beschikbaar voor deze geselecteerde datum');
        }

        return view('reservering.overzicht', compact('reserveringen', 'datum'));
    }

    /**
     * Show the form for editing a package option.
     */
    public function editPakket($id)
    {
        $reservering = $this->databaseService->getReservationDetails($id);

        if (!$reservering) {
            return redirect()->route('reservering.index')
                ->with('error', 'Reservering niet gevonden');
        }

        $pakketOpties = $this->databaseService->getAllPakketOpties();

        return view('reservering.edit-pakket', compact('reservering', 'pakketOpties'));
    }

    /**
     * Update the package option for a reservation.
     */
    public function updatePakket(Request $request, $id)
    {
        $pakketOptieId = $request->input('pakketoptie_id') ?: null;

        $result = $this->databaseService->updateReservationPackage($id, $pakketOptieId);

        if ($result['success']) {
            return redirect()->route('reservering.index')
                ->with('success', $result['message']);
        } else {
            return redirect()->route('reservering.edit.pakket', $id)
                ->with('error', $result['message']);
        }
    }
}
