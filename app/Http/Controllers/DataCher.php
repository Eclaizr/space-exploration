<?php

namespace App\Http\Controllers;

use App\Models\VueMissionsNonHabitees;
use App\Models\VueMissionsHabitees;
use App\Models\VuePlanetesHabitables;
use App\Models\VueExperiences;
use App\Models\VueObjetsDecouvert;
use Illuminate\Http\Request;

class DataCher extends Controller
{
    /**
     * Affiche TOUTES les données d'un coup
     */
    public function index()
    {
        // 1) Récupérer toutes les données de chaque "vue" Eloquent
        $missionsNonHabitees = VueMissionsNonHabitees::all();
        $missionsHabitees    = VueMissionsHabitees::all();
        $planetesHabitables  = VuePlanetesHabitables::all();
        $experiences         = VueExperiences::all();
        $objetsDecouverts    = VueObjetsDecouvert::all();

        // 2) Retourne UNE vue, en lui passant toutes les données
        return view('data_chercheur', compact(
            'missionsNonHabitees',
            'missionsHabitees',
            'planetesHabitables',
            'experiences',
            'objetsDecouverts'
        ));
    }
}
