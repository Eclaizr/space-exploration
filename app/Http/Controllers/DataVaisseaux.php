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

class DataVaisseaux extends Controller
{
    public function storeVaisseau(Request $request)
    {
        $messages = [
            'nomVaisseau.required' => 'Le nom du vaisseau est obligatoire.',
            'nomVaisseau.string' => 'Le nom du vaisseau doit être une chaîne de caractères.',
            'nomVaisseau.max' => 'Le nom du vaisseau ne peut pas dépasser 255 caractères.',
            'premierVol.required' => 'La date du premier vol est obligatoire.',
            'premierVol.date' => 'La date du premier vol doit être une date valide.',
            'dernierVol.date' => 'La date du dernier vol doit être une date valide.',
            'dernierVol.after_or_equal' => 'La date du dernier vol doit être postérieure ou égale à la date du premier vol.',
            'fabricant.required' => 'Le fabricant est obligatoire.',
            'fabricant.string' => 'Le fabricant doit être une chaîne de caractères.',
            'fabricant.max' => 'Le fabricant ne peut pas dépasser 255 caractères.',
            'technologie.required' => 'La technologie est obligatoire.',
            'technologie.string' => 'La technologie doit être une chaîne de caractères.',
            'technologie.max' => 'La technologie ne peut pas dépasser 255 caractères.',
        ];
    
        // Validation des données
        $validator = Validator::make($request->all(), [
            'nomVaisseau' => 'required|string|max:255',
            'premierVol' => 'required|date',
            'dernierVol' => 'nullable|date|after_or_equal:premierVol',
            'fabricant' => 'required|string|max:255',
            'technologie' => 'required|string|max:255',
            'etat' => 'nullable',
        ], $messages);
        
        if ($validator->fails()) {
            return redirect()->route('ajoutVaisseau')
                             ->withErrors($validator)
                             ->with('error', $validator->errors()->first());
        }

        $vaisseau = new VaisseauSpatial();
        $vaisseau->nomVaisseau = $request->nomVaisseau;
        $vaisseau->premierVol = $request->premierVol;
        $vaisseau->dernierVol = $request->dernierVol;
        $vaisseau->fabricant = $request->fabricant;
        $vaisseau->technologie = $request->technologie;
        if($request->etat == 'on'){
            $vaisseau->etat = 'Opérationnel';
        }else{
            $vaisseau->etat = 'Retraité';
        }
        $vaisseau->idLancement = $_POST['site'];
        $vaisseau->save();

        return redirect()->route('ajoutVaisseau')->with('success', 'Vaisseau ajouté avec succès');
    }

    public function deleteVaisseau(Request $request) {
        if(VaisseauSpatial::where('nomVaisseau', $request->nomVaisseau)->exists()){
            VaisseauSpatial::where('nomVaisseau', $request->nomVaisseau)->delete();
            return redirect()->route('ajoutVaisseau')->with('success', 'Vaisseau supprimé avec succès');
        }
        return redirect()->route('ajoutVaisseau')->with('error', 'Erreur : vaisseau non trouvé');
    }

}
