<?php
// filepath: c:\Users\clair\Desktop\space-exploration\routes\web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// Routes pour l'enregistrement
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Routes pour la connexion
Route::post('/login', [LoginController::class, 'login']);