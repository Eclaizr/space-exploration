<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VuePlanetesHabitables extends Model
{
    protected $table = 'vue_planetes_habitable'; // Correspond au nom de la vue SQL
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'distanceTerre' => 'float',
        'habitabilite' => 'float',
        'nombreMissions' => 'int'
    ];

    protected $fillable = [
        'nomObjet',
        'distanceTerre',
        'habitabilite',
        'nombreMissions'
    ];
}
