<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\CpmkController;

Route::get('/', function () {
    return view('home');
});

Route::resource('matakuliah', MataKuliahController::class);
Route::resource('cpmk', CpmkController::class);
