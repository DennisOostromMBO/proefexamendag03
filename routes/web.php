<?php

use App\Http\Controllers\ReserveringController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/mahdi.php';

// Reserveringen routes
Route::get('/reserveringen', [ReserveringController::class, 'index'])->name('reserveringen.index');
Route::get('/reserveringen/{id}/edit-pakket', [ReserveringController::class, 'editPakket'])->name('reserveringen.edit.pakket');
Route::post('/reserveringen/{id}/update-pakket', [ReserveringController::class, 'updatePakket'])->name('reserveringen.update.pakket');

