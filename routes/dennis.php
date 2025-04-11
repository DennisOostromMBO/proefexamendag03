<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveringController;
use App\Http\Controllers\BanenController;

Route::get('/reserveringen', [ReserveringController::class, 'index'])->name('reserveringen.index');
Route::get('/banen', [BanenController::class, 'index'])->name('banen.index');