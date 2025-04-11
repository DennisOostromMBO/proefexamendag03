<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveringController;
use App\Http\Controllers\BanenController;

Route::get('/reserveringen', [ReserveringController::class, 'index'])->name('reserveringen.index');
Route::get('/banen', [BanenController::class, 'index'])->name('banen.index');
Route::get('/reserveringen/{id}/edit', [ReserveringController::class, 'edit'])->name('reserveringen.edit');
Route::post('/reserveringen/{id}/update', [ReserveringController::class, 'update'])->name('reserveringen.update');