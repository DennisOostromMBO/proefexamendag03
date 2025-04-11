<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveringController;

Route::get('/reserveringen', [ReserveringController::class, 'index'])->name('reserveringen.index');