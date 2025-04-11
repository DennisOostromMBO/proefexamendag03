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

// The root route is now handled in wassim.php so we don't need this one
// Route::get('/', function () {
//     return view('welcome');
// });

// Include other route files
@include_once __DIR__.'/uitslag.php';
require __DIR__.'/mahdi.php';


