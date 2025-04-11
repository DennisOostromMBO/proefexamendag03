<?php
use App\Http\Controllers\ReserveringController;

Route::get('/reservering', [ReserveringController::class, 'index'])->name('reservering.index');
Route::get('/reservering/{id}/uitslagen', [ReserveringController::class, 'showUitslagen'])->name('reservering.uitslagen');
Route::get('/uitslag/{id}/edit', [ReserveringController::class, 'editUitslag'])->name('uitslag.edit');
Route::post('/uitslag/{id}/update', [ReserveringController::class, 'updateUitslag'])->name('uitslag.update');
Route::get('/uitslag', [ReserveringController::class, 'index'])->name('uitslag.index');