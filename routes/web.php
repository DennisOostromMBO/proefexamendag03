<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveringController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reserveringen', [ReserveringController::class, 'index'])->name('reserveringen.index');

require __DIR__ . '/dennis.php';
