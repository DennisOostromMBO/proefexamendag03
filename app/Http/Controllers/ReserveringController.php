<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReserveringController extends Controller
{
    /**
     * Display a listing of the reserveringen.
     */
    public function index()
    {
        return view('reserveringen.index');
    }
}
