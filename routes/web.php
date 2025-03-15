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

use App\Http\Controllers\ObjetsDecouvertsController;

Route::get('/objets', [ObjetsDecouvertsController::class, 'index'])->name('object_discovered.index');
Route::get('/objets/data', [ObjetsDecouvertsController::class, 'getObjetsExplores'])->name('object_discovered.data');
Route::get('/objets/filters', [ObjetsDecouvertsController::class, 'getFilters'])->name('object_discovered.filters');
