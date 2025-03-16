<?php
// filepath: c:\Users\clair\Desktop\space-exploration\app\Http\Controllers\LoginController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Authentification;
use App\Models\Login;
use App\Models\VueMissionsAstronaute;
use App\Models\VueAstronauteAgence;
use App\Models\VueObjetsDecouvert;
use App\Models\VueGestionnaireMission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');  // Afficher le formulaire de connexion
    }

    public function login(Request $request)
    {
        // Validation des données
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Tenter de se connecter avec les informations fournies
        if (Authentification::checkUser($request)) {
            // Si la connexion est réussie, créer une session
            $user = Auth::user();
            session(['user' => $user]);

            // Rediriger vers le tableau de bord
            return $this->redirectToDashboard($request);
        }

        // Si les identifiants sont incorrects, afficher un message d'erreur
        return back()->with('error', 'Identifiants invalides');
    }

    protected function redirectToDashboard(Request $request)
    {
        $usernameInput = $request->input('username');
        $user = Login::where('username', $usernameInput)->first();

        if (!$user) {
            return back()->with('error', 'Utilisateur non trouvé');
        }

        $role = $user->role; // "chercheur" ou "astronaute"

        if ($role == 'astronaute') {
            return redirect()->route('dataAstronaute');
        } elseif ($role == 'chercheur') {
            return redirect()->route('objets.index');
        } else {
            return redirect()->route('affichageGestionnaire');
        }
    }

    public function dashboard()
    {
        $user = Auth::user();

        if ($user->role == 'astronaute') {
            $missions = VueMissionsAstronaute::all();
            return view('dataAstronaute', compact('missions'));
        } elseif ($user->role == 'chercheur') {
            $objetsCelestes = VueObjetsDecouvert::all();
            return view('objets.index', compact('objetsCelestes'));
        } else {
            $missions = VueGestionnaireMission::all();
            return view('affichageGestionnaire', compact('missions'));
        }
    }


}