<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveringenController;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/dennis.php';
