<?php

namespace App\Http\Controllers;

use App\Models\VueMissionsNonHabitees;
use App\Models\VueMissionsHabitees;
use App\Models\VuePlanetesHabitables;
use App\Models\VueExperiences;
use App\Models\VueObjetsDecouvert;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    /**
     * Affiche le tableau de bord unique.
     */
    public function index(): View
    {
        return view('dashboard'); // => resources/views/dashboard.blade.php
    }

    /**
     * 1) Récupère les Missions Non Habitées.
     */
    public function getMissionsNonHabitees(): JsonResponse
    {
        return DataTables::of(VueMissionsNonHabitees::query())->make(true);
    }

    /**
     * 2) Récupère les Missions Habitées.
     */
    public function getMissionsHabitees(): JsonResponse
    {
        return DataTables::of(VueMissionsHabitees::query())->make(true);
    }

    /**
     * 3) Récupère les Planètes Habitables.
     */
    public function getPlanetesHabitables(): JsonResponse
    {
        return DataTables::of(VuePlanetesHabitables::query())->make(true);
    }

    /**
     * 4) Récupère les Expériences Scientifiques.
     */
    public function getExperiences(): JsonResponse
    {
        return DataTables::of(VueExperiences::query())->make(true);
    }

    /**
     * 5) Récupère les Objets Découverts.
     */
    public function getObjetsDecouverts(): JsonResponse
    {
        return DataTables::of(VueObjetsDecouvert::query())->make(true);
    }
}
