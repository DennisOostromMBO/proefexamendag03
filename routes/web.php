<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveringenController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reserveringen', [ReserveringenController::class, 'index'])->name('reserveringen.index');

require __DIR__ . '/dennis.php';
