<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

@include_once __DIR__.'/uitslag.php';
