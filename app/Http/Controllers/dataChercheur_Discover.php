<?php

namespace App\Http\Controllers;

use App\Models\VueObjetsDecouvert;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class dataChercheur_Discover extends Controller
{
    public function index()
    {
        return view('data_chercheur'); // Charge la vue Blade
    }

    public function getObjetsExplores(Request $request): JsonResponse
    {
        if ($request->ajax()) {
            $query = VueObjetsDecouvert::query()
                ->select([
                    'nomObjet',
                    'distanceTerre',
                    'revolution',
                    'anneeDecouverte',
                    'agenceDecouvreuse'
                ]);

            // Appliquer le filtre sur l'année
            if ($request->filled('annee')) {
                $query->where('anneeDecouverte', $request->annee);
            }

            // Appliquer le filtre sur l'agence
            if ($request->filled('agence')) {
                $query->where('agenceDecouvreuse', $request->agence);
            }

            return DataTables::of($query)->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

    public function getFilters(): JsonResponse
    {
        $annees = VueObjetsDecouvert::distinct()->pluck('anneeDecouverte');
        $agences = VueObjetsDecouvert::distinct()->pluck('agenceDecouvreuse');

        return response()->json([
            'annees' => $annees,
            'agences' => $agences
        ]);
    }
}
