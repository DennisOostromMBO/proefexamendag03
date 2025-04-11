<?php
use App\Http\Controllers\ReserveringController;

Route::get('/reservering', [ReserveringController::class, 'index'])->name('reservering.index');