<?php
use App\Http\Controllers\UitslagController;

Route::get('/uitslag', [UitslagController::class, 'index'])->name('uitslag.index');
Route::get('/uitslag/{id}/edit', [UitslagController::class, 'editUitslag'])->name('uitslag.edit');
Route::post('/uitslag/{id}/update', [UitslagController::class, 'updateUitslag'])->name('uitslag.update');
Route::get('/reservering/{id}/uitslagen', [UitslagController::class, 'showUitslagen'])->name('reservering.uitslagen');
Route::put('/uitslag/{id}/update', [UitslagController::class, 'updateUitslag'])->name('uitslag.update');