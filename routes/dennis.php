<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveringenController;
use App\Http\Controllers\BanenController;

Route::get('/reserveringen', [ReserveringenController::class, 'index'])->name('reserveringen.index');
Route::get('/banen', [BanenController::class, 'index'])->name('banen.index');
Route::get('/reserveringen/{id}/edit', [ReserveringenController::class, 'edit'])->name('reserveringen.edit');
Route::post('/reserveringen/{id}/update', [ReserveringenController::class, 'update'])->name('reserveringen.update');