<?php

use App\Http\Controllers\ReserveringController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveringenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home route will be handled directly here instead of in wassim.php
Route::get('/', function () {
    return view('welcome_reservering');
});

// Import the specialized route files
@include_once __DIR__.'/uitslag.php';
require __DIR__.'/mahdi.php';

// Define reservering routes directly here instead of including wassim.php
Route::get('/reservering', [ReserveringController::class, 'index'])->name('reservering.index');
Route::get('/reservering/{id}/edit-pakket', [ReserveringController::class, 'editPakket'])->name('reservering.edit.pakket');
Route::post('/reservering/{id}/update-pakket', [ReserveringController::class, 'updatePakket'])->name('reservering.update.pakket');


