<?php
// filepath: c:\Users\clair\Desktop\space-exploration\app\Http\Controllers\Auth\LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Login;

class LoginController extends Controller
{
    public function showLoginForm() // retourner la view login
    {
        return view('login'); // Update to point to the renamed file
    }

    public function login(Request $request)
    {
        // Validation des données
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Vérifier si l'utilisateur existe
        $user = Login::where('username', $request->username)->first();
        if (!$user) {
            return back()->with('error', 'Utilisateur introuvable');
        }

        // Vérifier le mot de passe haché
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Mot de passe invalide');
        }

        // Authentification réussie, rediriger vers la page d'accueil
        return redirect()->route('login')->with('success', 'Connexion réussie');
    }
}