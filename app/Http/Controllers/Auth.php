<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Chercheur;
use App\Models\Astronaute;

class Auth extends Controller
{
    public function checkUser(Request $request)
    {
        // 1. Récupérer l'ID et le mot de passe
        $idInput       = $request->input('id');
        $passwordInput = $request->input('password');

        // 2. Vérifier si l'utilisateur existe
        $user = User::find($idInput);
        if (!$user) {
            return back()->with('error', 'Utilisateur introuvable');
        }

        // 3. Vérifier le mot de passe haché
        if (!Hash::check($passwordInput, $user->password)) {
            return back()->with('error', 'Mot de passe invalide');
        }

        // 4. Vérifier le métier (chercheur ou astronaute)
        $metier = $user->metier; // "chercheur" ou "astronaute"

        // 5. Rediriger selon le métier
        if ($metier === 'astronaute') {
            // Redirige vers la route 'astronaute.show' en passant l'ID de l'utilisateur
            return redirect()->route('astronaute.show', $user->id);
        } else {
            // Sinon on considère qu'il est 'chercheur'
            return redirect()->route('chercheur.show', $user->id);
        }
    }
}
