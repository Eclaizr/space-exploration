<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Login;
use App\Models\Chercheur;
use App\Models\Astronaute;

class Authentification extends Controller
{
    public static function checkUser(Request $request)
    {
        // 1. Récupérer l'ID et le mot de passe
        $usernameInput = $request->input('username');
        $passwordInput = $request->input('password');

        // 2. Vérifier si l'utilisateur existe
        $user = Login::find($usernameInput);
        if (!$user) {
            return back()->with('error', 'Utilisateur introuvable');
        }

        // 3. Vérifier le mot de passe haché
        if (!Hash::check($passwordInput, $user->password)) {
            return back()->with('error', 'Mot de passe invalide');
        }

        // 4. Vérifier le métier (chercheur ou astronaute)
        $role = $user->role; // "chercheur" ou "astronaute"

        // 5. Rediriger selon le métier
        if ($role === 'astronaute') {
            // Redirige vers la route 'astronaute.show' en passant l'ID de l'utilisateur
            return redirect()->route('astronaute.show', $user->username);
        } else {
            // Sinon on considère qu'il est 'chercheur'
            return redirect()->route('chercheur.show', $user->username);
        }
    }
}