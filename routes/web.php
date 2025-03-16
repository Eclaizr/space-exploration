<?php
// filepath: c:\Users\clair\Desktop\space-exploration\routes\web.php

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
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

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
Route::get('/dataAstronaute', [DataAstro::class, 'index'])->name('dataAstronaute');
Route::get('/dataAstronaute/data', [DataAstro::class, 'getMissions'])->name('data');
Route::get('/dataAstronaute/liste', [DataAstro::class, 'getAstronautes'])->name('liste');

Route::get('/affichageGestionnaire', [DataGestionnaire::class, 'index'])->name('affichageGestionnaire');

use App\Http\Controllers\dataChercheur_Discover;

Route::get('/objets-decouverts', [dataChercheur_Discover::class, 'index'])->name('objets.index');
Route::get('/objets-decouverts/data', [dataChercheur_Discover::class, 'getObjetsExplores'])->name('objets.data');
Route::get('/objets-decouverts/filters', [dataChercheur_Discover::class, 'getFilters'])->name('objets.filters');