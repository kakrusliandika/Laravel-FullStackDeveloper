<?php

use Illuminate\Support\Facades\Route;

// Route::middleware(['http.logger'])->get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('welcome');
});