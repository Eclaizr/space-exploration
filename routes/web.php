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

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/missions/non-habitees/data', [DashboardController::class, 'getMissionsNonHabitees'])->name('missions.non_habitees.data');

Route::get('/missions/habitees/data', [DashboardController::class, 'getMissionsHabitees'])->name('missions.habitees.data');

Route::get('/planetes/habitables/data', [DashboardController::class, 'getPlanetesHabitables'])->name('planetes.habitables.data');

Route::get('/experiences/data', [DashboardController::class, 'getExperiences'])->name('experiences.data');
