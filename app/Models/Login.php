<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Login extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['username', 'password', 'role'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($login) {
            $login->password = Hash::make($login->password);
        });
    }

    // Vérifier le rôle
    
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isGestionnaire()
    {
        return $this->role === 'gestionnaire';
    }

    public function isAstronaute()
    {
        return $this->role === 'astronaute';
    }

    public function isChercheur()
    {
        return $this->role === 'chercheur';
    }
}
