<?php

namespace App\Http\Controllers;

use App\Models\VueMissionsNonHabitees;
use App\Models\VueMissionsHabitees;
use App\Models\VuePlanetesHabitables;
use App\Models\VueExperiences;
use App\Models\VueObjetsDecouvert;
use Illuminate\Http\Request;
use App\Models\Experiencescientifique;
use App\Models\Objetceleste;
use App\Models\Agencespatiale;

class DataCher extends Controller
{
    /**
     * Affiche toutes les données
     */
    public function index()
    {
        $missionsNonHabitees = VueMissionsNonHabitees::all();
        $missionsHabitees    = VueMissionsHabitees::all();
        $planetesHabitables  = VuePlanetesHabitables::all();
        $experiences         = Experiencescientifique::all(); // Récupérer les expériences
        $objetsDecouverts    = VueObjetsDecouvert::all();

        return view('data_chercheur', compact(
            'missionsNonHabitees',
            'missionsHabitees',
            'planetesHabitables',
            'experiences',
            'objetsDecouverts'
        ));
    }

    /**
     * Afficher le formulaire pour ajouter une expérience
     */
    public function createExperience()
    {
        $typesExperience = [
            'Horticulture', 'Géologie', 'Télécommunications', 'Informatique', 'Science', 
            'Biologie', 'Chimie', 'Éducation', 'Médecine', 'Astrophysique', 'Autre'
        ];
        return view('formExperience', compact('typesExperience'));
    }

    /**
     * Ajouter une nouvelle expérience dans la table réelle (pas la vue)
     */
    public function storeExperience(Request $request)
    {
        $request->validate([
            'nomExperience' => 'required|string|max:50',
            'typeExperience' => 'required|in:Horticulture,Géologie,Télécommunications,Informatique,Science,Biologie,Chimie,Éducation,Médecine,Astrophysique,Autre',
            'resultats' => 'required|string',
        ]);

        Experiencescientifique::create($request->all());

        return redirect()->route('data_chercheur')->with('success', 'Expérience ajoutée avec succès');
    }

    /**
     * Afficher le formulaire pour ajouter un objet découvert
     */
    public function createObjetDecouvert()
    {
        $agences = Agencespatiale::all(); // Récupérer toutes les agences spatiales
        return view('formObjetDecouvert', compact('agences'));
    }

    /**
     * Ajouter un nouvel objet découvert dans la table réelle
     */
    public function storeObjetDecouvert(Request $request)
    {
        $request->validate([
            'nomObjet' => 'required|string|max:255',
            'distanceTerre' => 'required|numeric',
            'revolution' => 'required|numeric',
            'anneeDecouverte' => 'required|integer',
            'agenceDecouvreuse' => 'required|string|max:255',
        ]);

        Objetceleste::create($request->all());

        return redirect()->route('data_chercheur')->with('success', 'Objet découvert ajouté avec succès');
    }
}