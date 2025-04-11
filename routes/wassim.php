<?php

use App\Http\Controllers\ReserveringController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Wassim Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes specifically for the
| reservering functionality. These routes are loaded by the
| RouteServiceProvider and assigned to the "web" middleware group.
|
*/

// Home route - direct to reservations index instead of missing welcome view
Route::get('/', function () {
    return redirect()->route('reservering.index');
});

// Reservering routes
Route::get('/reservering', [ReserveringController::class, 'index'])->name('reservering.index');
Route::get('/reservering/{id}/edit-pakket', [ReserveringController::class, 'editPakket'])->name('reservering.edit.pakket');
Route::post('/reservering/{id}/update-pakket', [ReserveringController::class, 'updatePakket'])->name('reservering.update.pakket');
