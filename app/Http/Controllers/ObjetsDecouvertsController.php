<?php

namespace App\Http\Controllers;

use App\Models\VueObjetsDecouvert;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ObjetsDecouvertsController extends Controller
{
    /**
     * Affiche la vue principale.
     */
    public function index(): View
    {
        return view('ObjectDiscovered.index');
    }

    /**
     * Récupère la liste des objets explorés avec filtres.
     */
    public function getObjetsExplores(Request $request): JsonResponse
    {
        $query = VueObjetsDecouvert::query()->select([
            'nomObjet',
            'distanceTerre',
            'revolution',
            'anneeDecouverte',
            'agenceDecouvreuse'
        ]);

        // Appliquer les filtres
        if ($request->filled('annee')) {
            $query->where('anneeDecouverte', $request->annee);
        }
        if ($request->filled('agence')) {
            $query->where('agenceDecouvreuse', $request->agence);
        }

        return DataTables::of($query)->make(true);
    }

    /**
     * Récupère les années et agences uniques pour les filtres.
     */
    public function getFilters(): JsonResponse
    {
        $annees = VueObjetsDecouvert::distinct()->orderBy('anneeDecouverte')->pluck('anneeDecouverte');
        $agences = VueObjetsDecouvert::distinct()->orderBy('agenceDecouvreuse')->pluck('agenceDecouvreuse');

        return response()->json([
            'annees' => $annees->isNotEmpty() ? $annees : [],
            'agences' => $agences->isNotEmpty() ? $agences : []
        ]);
    }
}
