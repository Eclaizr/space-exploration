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

use App\Http\Controllers\dataChercheur_Discover;


Route::get('/objets-decouverts', [dataChercheur_Discover::class, 'index'])->name('objets.index');
Route::get('/objets-decouverts/data', [dataChercheur_Discover::class, 'getObjetsExplores'])->name('objets.data');
Route::get('/objets-decouverts/filters', [dataChercheur_Discover::class, 'getFilters'])->name('objets.filters');
