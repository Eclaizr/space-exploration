<?php

namespace App\Http\Controllers;

use App\Models\Astronaute;
use App\Models\Affectation;
use App\Models\Missionspatiale;
use App\Models\MissionAttribution;
use App\Models\VaisseauSpatial;
use App\Models\VueMissionsAstronaute;
use App\Models\VueAstronauteAgence;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class DataGestionnaire extends Controller
{
    public function ajoutAstronaute()
    {
        return view('ajoutAstronaute'); // Charge la vue
    }

    public function ajoutMission()
    {
        return view('ajoutMission'); // Charge la vue
    }

    // Méthode qui va stocker les astronautes dans la base de données
    public function storeAstronaute(Request $request)
    {
        /*
        // Validation des données en fonction des contraintes
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'date_naissance' => 'required|date|before:today|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'nationalite' => 'required|string|max:50',
            'Poste' => 'required|string|max:50',
            'agence' => 'required|string|max:50',
            'date_debut_poste' => 'required|date|before:today',
        ]);*/
        // Messages de validation personnalisés
        $messages = [
            'nomAstro.required' => 'Le nom est obligatoire.',
            'prenomAstro.required' => 'Le prénom est obligatoire.',
            'dateNaissanceAstro.required' => 'La date de naissance est obligatoire.',
            'dateNaissanceAstro.before' => 'La date de naissance doit être une date antérieure à aujourd\'hui.',
            'dateNaissanceAstro.before_or_equal' => 'L\'astronaute doit être majeur.',
            'nationalite.required' => 'La nationalité est obligatoire.',
            'Poste.required' => 'Le poste est obligatoire.',
            'Agence.required' => 'L\'agence est obligatoire.',
            'date_debut_poste.required' => 'La date de début de poste est obligatoire.',
            'date_debut_poste.before' => 'La date de début de poste doit être une date antérieure à aujourd\'hui.',
        ];
        // Validation des données
        $validator = Validator::make($request->all(), [
            'nomAstro' => 'required|string|max:50',
            'prenomAstro' => 'required|string|max:50',
            'dateNaissanceAstro' => 'required|date|before:today|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'nationalite' => 'required|string|max:50',
            'Poste' => 'required|string|max:50',
            'Agence' => 'required|string|max:50',
            'date_debut_poste' => 'required|date|before:today',
        ], $messages);
        
        if ($validator->fails()) {
            return redirect()->route('ajoutAstronaute')
                             ->withErrors($validator)
                             ->with('error', $validator->errors()->first());
        }
        
        $astronaute = new Astronaute();
        $astronaute->nomAstro = $request->nomAstro;
        $astronaute->prenomAstro = $request->prenomAstro;
        $astronaute->dateNaissanceAstro = $request->dateNaissanceAstro;
        $astronaute->nationalite = $request->nationalite;
        $astronaute->Poste = $request->Poste;
        $astronaute->statut = 'Actif';
        $astronaute->save();


        $affectation = new Affectation();
        $affectation->idAstro = $astronaute->idAstro;
        $affectation->nomAgence = $request->Agence;
        $affectation->dateDebut = $request->date_debut_poste;
        $affectation->dateFin = null;
        $affectation->save();
        

        return redirect()->route('ajoutAstronaute')->with('success', 'Astronaute ajouté avec succès');
    }

    public function modifyAstronaute(Request $request)
    {
        if(!Astronaute::where('nomAstro', $request->nomAstro)->where('prenomAstro', $request->prenomAstro)->exists()){
            return redirect()->route('ajoutAstronaute')->with('error', 'Erreur : astronaute non trouvé');
        }
        $astronaute = Astronaute::where('nomAstro', $request->nomAstro)->where('prenomAstro', $request->prenomAstro)->first();
        $idAstro = $astronaute->idAstro;
        $astronaute->statut = 'Retraité';
        $astronaute->save();

        if(Affectation::where('idAstro', $idAstro)->where('dateFin', null)->exists()){
            $affectation = Affectation::where('idAstro', $idAstro)->where('dateFin', null)->first();
            $affectation->dateFin = now();
            $affectation->save();
        }

        return redirect()->route('ajoutAstronaute')->with('success', 'Astronaute modifié avec succès');
    }

    public function deleteAstronaute(Request $request)
    {
        if(!Astronaute::where('nomAstro', $request->nomAstro)->where('prenomAstro', $request->prenomAstro)->exists()){
            return redirect()->route('ajoutAstronaute')->with('error', 'Erreur : astronaute non trouvé');
        }
        $astronaute = Astronaute::where('nomAstro', $request->nomAstro)->where('prenomAstro', $request->prenomAstro)->first();
        $astronaute->delete();
        return redirect()->route('ajoutAstronaute')->with('success', 'Astronaute supprimé avec succès');
    }

    public function createMission(Request $request){
        $messages = [
            'nomMission.required' => 'Le nom de la mission est obligatoire.',
            'dateDepart.required' => 'La date de départ est obligatoire.',
            'dateDepart.date' => 'La date de départ doit être une date valide.',
            'dateRetour.required' => 'La date de retour est obligatoire.',
            'dateRetour.date' => 'La date de retour doit être une date valide.',
            'objectif.required' => 'L\'objectif est obligatoire.',
            'statut.required' => 'Le statut est obligatoire.',
            'vaisseau.required' => 'Le nom du vaisseau est obligatoire.',
        ];
    
        // Validation des données
        $validator = Validator::make($request->all(), [
            'nomMission' => 'required|string|max:255',
            'dateDepart' => 'required|date',
            'dateRetour' => 'required|date|after_or_equal:dateDepart',
            'objectif' => 'required|string|max:255',
            'statut' => 'required|string|in:reussite,echec',
            'vaisseau' => 'required',
        ], $messages);
        
        if ($validator->fails()) {
            return redirect()->route('ajoutMission')
                             ->withErrors($validator)
                             ->with('error', $validator->errors()->first());
        }

        $mission = new Missionspatiale();
        $mission->nomMission = $request->nomMission;
        $mission->dateDepart = $request->dateDepart;
        $mission->dateRetour = $request->dateRetour;
        $mission->objectif = $request->objectif;
        if($request->estHabitee == 'on'){
            $mission->estHabitee = true;
        }else{
            $mission->estHabitee = false;
        }
        $mission->statut = $request->statut;
        $mission->idVaisseau = $_POST['vaisseau'];
        $mission->save();

        return redirect()->route('ajoutMission')->with('success', 'Mission ajoutée avec succès');
    }

    public function attribueMission(Request $request){
        $messages = [
            'role.required' => 'Veuillez renseigner un rôle.',
        ];
    
        // Validation des données
        $validator = Validator::make($request->all(), [
            'role' => 'required|string|max:255',
        ], $messages);
        
        if ($validator->fails()) {
            return redirect()->route('ajoutMission')
                             ->withErrors($validator)
                             ->with('error', $validator->errors()->first());
        }

        $idAstro = $_POST['astronaute'];
        
        if(MissionAttribution::where('idAstro', $idAstro)->where('idMission', $_POST['mission'])->exists()){
            return redirect()->route('ajoutMission')->with('error', 'Erreur : cette mission déjà attribuée à cet astronaute');   
        }

        $missionAttribution = new MissionAttribution();
        $missionAttribution->idAstro = $idAstro;
        $missionAttribution->idMission = $_POST['mission'];
        $missionAttribution->role = $request->role;
        $missionAttribution->dateParticipation = $request->date_participation;
        $missionAttribution->save();

        return redirect()->route('ajoutMission')->with('success', 'L\'affectation a été réalisée avec succès');   

    }
}