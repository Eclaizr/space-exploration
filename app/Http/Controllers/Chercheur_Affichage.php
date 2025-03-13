<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chercheur;

class Chercheur_Affichage extends Controller
{
    public function show($id)
    {
        // Récupérer l'utilisateur
        $user = User::find($id);
        if (!$user) {
            return back()->with('error', 'Utilisateur introuvable');
        }

        // Récupérer les infos de chercheur (table `chercheurs`)
        $profil = Chercheur::where('user_id', $user->id)->first();
        if (!$profil) {
            return back()->with('error', 'Profil chercheur introuvable');
        }

        return view('chercheur', [
            'user'   => $user,
            'profil' => $profil
        ]);
    }
}
