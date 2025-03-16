<?php
// filepath: c:\Users\clair\Desktop\space-exploration\app\Http\Middleware\CheckRole.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Authentification;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
            $user = Auth::user();
    
            // Vérifier si l'utilisateur a l'un des rôles spécifiés
            if (!in_array($user->role, $roles)) {
                return redirect('welcome');  // Rediriger si l'utilisateur n'a pas le bon rôle
            }
    
            return $next($request);
        }
}