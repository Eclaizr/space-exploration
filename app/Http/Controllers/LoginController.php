<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VueMissionsAstronaute;
use App\Models\VueGestionnaireMission;
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
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user && isset($user->role)) {
                return $this->redirectToDashboard($user->role);
            }
        }
        return to_route('auth.login')->with('error', 'Login ou mot de passe incorrect');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('auth.login');
    }

    protected function redirectToDashboard($role)
    {
        if ($role == 'astronaute') {
            return redirect()->route('dataAstronaute');
        } elseif ($role == 'chercheur') {
            return redirect()->route('data_chercheur');
        } else {
            return redirect()->route('dataAstronaute');
        }
    }

    public function dashboard()
    {
        $user = Auth::user();

        if ($user && isset($user->role)) {
            if ($user->role == 'astronaute') {
                $missions = VueMissionsAstronaute::all();
                return view('dataAstronaute', compact('missions'));
            } elseif ($user->role == 'chercheur') {
                $objetsCelestes = app(DataCher::class)->getObjetsDecouverts()->getData();
                return view('data_chercheur', compact('objetsCelestes'));
            } else {
                $missions = VueGestionnaireMission::all();
                return view('affichageGestionnaire', compact('missions'));
            }
        }

        return to_route('auth.login')->with('error', 'User not authenticated or role not found');
    }
}
