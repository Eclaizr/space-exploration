<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VueExperiences extends Model
{
    protected $table = 'vue_experiences'; // Correspond au nom de la vue SQL
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idExperience',
        'nomExperience',
        'typeExperience',
        'resultats',
        'nomMission',
        'nomAgence'
    ];
}
