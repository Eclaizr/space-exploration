<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Astronaute;

class Astro_Affichage extends Controller
{
    public function show($id)
    {
        // Récupérer l'utilisateur via son ID
        $user = Login::find($id);
        if (!$user) {
            return back()->with('error', 'Utilisateur introuvable');
        }

        // Récupérer les infos d'astronaute (table `astronautes`)
        $profil = Astronaute::where('idAstro', $user->id)->first();
        if (!$profil) {
            return back()->with('error', 'Profil astronaute introuvable');
        }

        // Retourner la vue 'astronaute.blade.php' avec l'utilisateur + infos astronaute
        return view('astronaute', [
            'user'   => $user,
            'profil' => $profil
        ]);
    }
}
