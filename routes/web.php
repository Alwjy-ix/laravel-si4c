<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PeriodeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('fakultas', FakultasController::class);

Route::resource('periode', PeriodeController::class);

Route::resource('berita', BeritaController::class);
