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
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');  // Afficher le formulaire de connexion
    }

    public function doLogin(LoginRequest $request)
    {
        // on recup le couple username/password -> tableau username et password
        $credentials = $request->validated();

        // on va verifier ces infos
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;
            return $this->redirectToDashboard($role);
        }
        return to_route('auth.login')->with('error', 'Login ou mot de passe incorrect');
        
    }

    public function logout()
    {
        Auth::logout();
        return to_route('auth.login');
    }

//return $this->redirectToDashboard($request);
    protected function redirectToDashboard($role)
    {
        if ($role == 'astronaute') {
            return redirect()->route('dataAstronaute');
        } elseif ($role == 'chercheur') {
            return redirect()->route('objets.index');
        } else {
            return redirect()->route('dataAstronaute');
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