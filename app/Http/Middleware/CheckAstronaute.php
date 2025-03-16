<?php
// filepath: c:\Users\clair\Desktop\space-exploration\app\Http\Middleware\CheckRole.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Authentification;
use Illuminate\Support\Facades\Auth;

class CheckAstronaute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param mixed ...$roles
     * @return \Illuminate\Http\Response
     */

    public function handle(Request $request, Closure $next, ...$roles)
        {
            $role = Auth::user()->role;
            // Vérifier si l'utilisateur a l'un des rôles spécifiés
            if (!($role === 'astronaute' || $role === 'gestionnaire')) {
                return to_route('welcome');  // Rediriger si l'utilisateur n'a pas le bon rôle
            }
    
            return $next($request);
        }
}