<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AstroController;

Route::get('/', function () {
    return view('welcome');
});

// Protège la route avec 'auth' si nécessaire
Route::middleware('auth')->group(function () {
    Route::get('/affichage_astro', [AstroController::class, 'showProfile'])->name('profil');
});
