<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VueMissionsHabitees extends Model
{
    protected $table = 'vue_missions_habitees'; // Correspond au nom de la vue SQL
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'distanceTerre' => 'float',
        'anneeDecouverte' => 'int',
        'revolution' => 'float',
        'nombreMissions' => 'int'
    ];

    protected $fillable = [
        'nomObjet',
        'distanceTerre',
        'anneeDecouverte',
        'revolution',
        'nomAgence',
        'nombreMissions'
    ];
}
