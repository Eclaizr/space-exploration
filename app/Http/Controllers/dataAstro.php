<?php

namespace App\Http\Controllers;

use App\Models\Missionspatiale;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class dataAstro extends Controller
{
    public function index()
    {
        return view('data_astronaute'); // Affiche la vue où le tableau sera affiché
    }


    public function getMissions(Request $request): JsonResponse
    {
        if ($request->ajax()) {
            $query = Missionspatiale::select([
                'idMission',
                'nomMission',
                'dateDepart',
                'dateRetour',
                'objectif',
                'estHabitee',
                'statut',
                'idVaisseau'
            ]);

            // Apply the filter if selected
            $filter = $request->input('filter', 'all');

            if ($filter === 'past') {
                $query->where('dateRetour', '<', now()); // Past missions
            } elseif ($filter === 'future') {
                $query->where('dateDepart', '>', now()); // Future missions
            }

            return response()->json(DataTables::of($query)->make());
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

}
