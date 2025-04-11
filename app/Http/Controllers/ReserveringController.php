<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReserveringController extends Controller
{
    /**
     * Display a listing of the reserveringen.
     */
    public function index()
    {
        $reserveringen = DB::select('CALL GetAllReserveringen()');
        return view('reserveringen.index', compact('reserveringen'));
    }
}
