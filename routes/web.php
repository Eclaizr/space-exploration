<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Astro_Affichage;

Route::get('/', function () {
    return view('welcome');
});

// Protège la route avec 'auth' si nécessaire
Route::middleware('auth')->group(function () {
    Route::get('/affichage_astro', [Astro_Affichage::class, 'showProfile'])->name('profil');
});

use App\Http\Controllers\dataAstro;

Route::get('/data_astronaute', [DataAstro::class, 'index'])->name('data_astronaute');
Route::get('/data_astronaute/data', [DataAstro::class, 'getMissions'])->name('data');
