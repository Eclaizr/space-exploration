<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AstroController extends Controller
{
    public function showProfile()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Retourner une vue (ex: affichage_astro.blade.php) avec l'utilisateur
        return view('affichage_astro', compact('user'));
    }
}
