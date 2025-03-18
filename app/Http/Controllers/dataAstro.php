<?php

namespace App\Http\Controllers;

use App\Models\Sitelancement;
use App\Models\Vaisseauspatial;
use App\Models\VueMissionsAstronaute;
use App\Models\VueAstronauteAgence;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class dataAstro extends Controller
{
    public function index()
    {
        return view('dataAstronaute'); // Charge la vue
    }

    public function getMissions(Request $request): JsonResponse
    {
        if ($request->ajax()) {
            $query = VueMissionsAstronaute::query()
                ->select([
                    //'idAstro',
                    'nomAstro',
                    'prenomAstro',
                    'nomMission',
                    'dateDepart',
                    'dateRetour',
                    'statut'
                ]);

            // Vérifier si un filtre est appliqué
            $filter = $request->input('filter', 'all');

            if ($filter === 'past') {
                $query->where('dateRetour', '<', now()); // Missions passées
            } elseif ($filter === 'future') {
                $query->where('dateDepart', '>', now()); // Missions futures
            }

            return DataTables::of($query)
                ->editColumn('dateDepart', function ($row) {
                    return $row->dateDepart ? $row->dateDepart->format('d-m-Y') : 'N/A';
                })
                ->editColumn('dateRetour', function ($row) {
                    return $row->dateRetour ? $row->dateRetour->format('d-m-Y') : 'N/A';
                })
                ->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

    public function getAstronautes(Request $request): JsonResponse
    {
        if ($request->ajax()) {
            $query = VueAstronauteAgence::query()
                ->select([
                    'nomAstro',
                    'prenomAstro',
                    'nationalite',
                    'nombreMissions',
                    'Poste',
                    'agence'
                ]);

            return DataTables::of($query)
                ->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

    function getVaisseaux(Request $request): JsonResponse
    {
        if ($request->ajax()) {
            $query = Vaisseauspatial::query()
                ->select([
                    'nomVaisseau',
                    'premierVol',
                    'dernierVol',
                    'etat',
                    'technologie',
                    'fabricant',
                ]);

            return DataTables::of($query)
                ->editColumn('premierVol', function ($row) {
                    return $row->premierVol ? $row->premierVol->format('d-m-Y') : 'N/A';
                })
                ->editColumn('dernierVol', function ($row) {
                    return $row->dernierVol ? $row->dernierVol->format('d-m-Y') : 'N/A';
                })
                ->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

    function getSitesLancement(Request $request): JsonResponse
    {
        if ($request->ajax()) {
            $query = Sitelancement::query()
                ->select([
                    'adresse',
                    'pays',
                ]);

            return DataTables::of($query)
                ->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

    function ajoutVaisseau()
    {
        return view('vueAjoutVaisseaux');
    }
}