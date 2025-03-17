<?php
// filepath: c:\Users\clair\Desktop\space-exploration\routes\web.php

use App\Http\Middleware\CheckAstronaute;
use App\Http\Middleware\CheckChercheur;
use App\Http\Middleware\CheckGestionnaire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\dataAstro;
use App\Http\Controllers\dataChercheur;
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

// Routes ajout astro
Route::middleware(['isGestionnaire'=>CheckGestionnaire::class])->group( function (){
    Route::get('/dataAstronaute/ajout', [DataGestionnaire::class, 'ajoutAstronaute'])->name('ajoutAstronaute');
    Route::post('/dataAstronaute/ajout',[DataGestionnaire::class, 'storeAstronaute'])->name('storeAstronaute');
    Route::get('/dataAstronaute/modification',[DataGestionnaire::class, 'modifyAstronaute'])->name('modifyAstronaute');
    Route::put('/dataAstronaute/modification',[DataGestionnaire::class, 'modifyAstronaute'])->name('modifyAstronaute');
    Route::get('/dataAstronaute/suppression',[DataGestionnaire::class, 'deleteAstronaute'])->name('deleteAstronaute');
    Route::delete('/dataAstronaute/suppression',[DataGestionnaire::class, 'deleteAstronaute'])->name('deleteAstronaute');

    Route::get('/ajoutMission', [DataGestionnaire::class, 'ajoutMission'])->name('ajoutMission');
    Route::post('/ajoutMission', [DataGestionnaire::class, 'createMission'])->name('createMission');
    Route::post('/ajoutMission/attribution', [DataGestionnaire::class, 'attribueMission'])->name('attribueMission');
});

use App\Http\Controllers\dataChercheur_Discover;

Route::middleware(['isChercheur'=>CheckChercheur::class])->group( function (){
    Route::get('/objets-decouverts', [dataChercheur_Discover::class, 'index'])->name('objets.index');
    Route::get('/objets-decouverts/data', [dataChercheur_Discover::class, 'getObjetsExplores'])->name('objets.data');
    Route::get('/objets-decouverts/filters', [dataChercheur_Discover::class, 'getFilters'])->name('objets.filters');
});