<?php

namespace App\Http\Controllers;

use App\Models\VueMissionsNonHabitees;
use App\Models\VueMissionsHabitees;
use App\Models\VuePlanetesHabitables;
use App\Models\VueExperiences;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    /**
     * Affiche le tableau de bord unique.
     * Correspond à la vue "dashboard.blade.php".
     */
    public function index(): View
    {
        // Simplement retourner la vue unique
        return view('dashboard');
    }

    /**
     * Récupère les données (JSON) pour le tableau Missions Non Habitées.
     */
    public function getMissionsNonHabitees(): JsonResponse
    {
        // On renvoie un DataTable basé sur le modèle VueMissionsNonHabitees
        return DataTables::of(VueMissionsNonHabitees::query())->make(true);
    }

    /**
     * Récupère les données (JSON) pour le tableau Missions Habitées.
     */
    public function getMissionsHabitees(): JsonResponse
    {
        return DataTables::of(VueMissionsHabitees::query())->make(true);
    }

    /**
     * Récupère les données (JSON) pour le tableau Planètes Habitables.
     */
    public function getPlanetesHabitables(): JsonResponse
    {
        return DataTables::of(VuePlanetesHabitables::query())->make(true);
    }

    /**
     * Récupère les données (JSON) pour le tableau Expériences Scientifiques.
     */
    public function getExperiences(): JsonResponse
    {
        return DataTables::of(VueExperiences::query())->make(true);
    }
}
