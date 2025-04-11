<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersoonController;

Route::get('/klanten', [PersoonController::class, 'index'])->name('klanten.index');
Route::get('/klanten/{id}/edit', [PersoonController::class, 'edit'])->name('klanten.edit');
Route::put('/klanten/{id}', [PersoonController::class, 'update'])->name('klanten.update');
