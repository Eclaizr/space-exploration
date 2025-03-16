<?php
// filepath: c:\Users\clair\Desktop\space-exploration\routes\web.php

use App\Http\Middleware\CheckAstronaute;
use App\Http\Middleware\CheckChercheur;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\dataAstro;
use App\Http\Controllers\DataCher;
use App\Http\Controllers\dataGestionnaire;

// Route pour afficher la page d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Routes pour la connexion
Route::get('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/login', [LoginController::class, 'doLogin']);
Route::delete('/logout', [LoginController::class, 'logout'])->name('auth.logout');

// Routes pour l'enregistrement
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Route pour le tableau de bord
//Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

// Routes pour les différentes vues de tableau de bord
// Route::get('/dataAstronaute', [dataAstro::class, 'index'])->name('dataAstronaute')->middleware('role:astronaute,gestionnaire');
// Route::get('/dataChercheur', [dataChercheur::class, 'index'])->name('dataChercheur')->middleware('role:chercheur');
// Route::get('/dataGestionnaire', [dataGestionnaire::class, 'index'])->name('dataGestionnaire')->middleware('role:gestionnaire');
Route::middleware(['isAstronaute'=>CheckAstronaute::class])->group( function (){
    Route::get('/dataAstronaute', [DataAstro::class, 'index'])->name('dataAstronaute');
    Route::get('/dataAstronaute/data', [DataAstro::class, 'getMissions'])->name('data');
    Route::get('/dataAstronaute/liste', [DataAstro::class, 'getAstronautes'])->name('liste');

});

Route::get('/affichageGestionnaire', [DataGestionnaire::class, 'index'])->name('affichageGestionnaire');


Route::middleware(['isChercheur' => CheckChercheur::class])->group(function () {
    Route::get('/objets-decouverts', [DataCher::class, 'index'])->name('objets.index');
    Route::get('/objets-decouverts/data', [DataCher::class, 'getObjetsDecouverts'])->name('objets.data');
    Route::get('/objets-decouverts/filters', [DataCher::class, 'getFilters'])->name('objets.filters');
    Route::get('/missions-non-habitees', [DataCher::class, 'getMissionsNonHabitees'])->name('missions.non_habitees');
    Route::get('/missions-habitees', [DataCher::class, 'getMissionsHabitees'])->name('missions.habitees');
    Route::get('/planetes-habitables', [DataCher::class, 'getPlanetesHabitables'])->name('planetes.habitables');
    Route::get('/experiences-scientifiques', [DataCher::class, 'getExperiences'])->name('experiences.scientifiques');
});

