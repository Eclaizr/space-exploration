<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class Login extends Authenticatable
{
    use HasFactory;
    use HasRoles;

    protected $fillable = ['username', 'password', 'role'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($login) {
            //$login->password = Hash::make($login->password);
        });
    }

    public function isAstronaute()
    {
        return $this->role === 'astronaute';
    }

    public function isChercheur()
    {
        return $this->role === 'chercheur';
    }

    public function isGestionnaire()
    {
        return $this->role === 'gestionnaire';
    }

}
