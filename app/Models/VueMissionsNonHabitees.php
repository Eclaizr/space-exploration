<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VueMissionsNonHabitees extends Model
{
    protected $table = 'vue_missions_non_habitees';
    public $timestamps = false;

    protected $fillable = [
        'nomMission',
        'dateDepart',
        'dateRetour',
        'objectif',
        'estHabitee',
        'statut'
    ];
}