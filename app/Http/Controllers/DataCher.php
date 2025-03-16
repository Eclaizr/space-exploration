<?php namespace App\Http\Controllers;

use App\Models\VueMissionsNonHabitees;
use App\Models\VueMissionsHabitees;
use App\Models\VuePlanetesHabitables;
use App\Models\VueExperiences;
use App\Models\VueObjetsDecouvert;
use Illuminate\Http\Request;
use App\Models\Experiencescientifique;
use App\Models\Objetceleste;
use Illuminate\Support\Facades\DB;

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
        $experiences         = VueExperiences::all();
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
        return view('formExperience');
    }

    /**
     * Ajouter une nouvelle expérience dans la table réelle (pas la vue)
     */
    public function storeExperience(Request $request)
    {
        $request->validate([
            
            'nomExperience' => 'required|string|max:50',
            'typeExperience' => 'required|in:Horticulture,Géologie,Télécommunication',
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
        return view('formObjetDecouvert');
    }

    /**
     * Ajouter un nouvel objet découvert dans la table réelle
     */
    public function storeObjetDecouvert(Request $request)
    {
        $validatedData = $request->validate([
            'nomObjet' => 'required|string|max:255',
            'distanceTerre' => 'required|numeric',
            'revolution' => 'required|numeric',
            'anneeDecouverte' => 'required|integer',
            'agenceDecouvreuse' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            $existingObjet = Objetceleste::where('nomObjet', $validatedData['nomObjet'])->first();

            if ($existingObjet) {
                return redirect()->route('formObjetDecouvert')->with('error', 'Cet objet existe déjà.');
            }

            Objetceleste::create($validatedData);

            DB::commit();

            return redirect()->route('data_chercheur')->with('success', 'Objet découvert ajouté avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('formObjetDecouvert')->with('error', 'Erreur lors de l\'ajout : ' . $e->getMessage());
        }
    }
}
