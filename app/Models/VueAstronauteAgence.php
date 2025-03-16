<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VueMissionsAstronaute
 * 
 * @property string $nom_astronaute
 * @property string $prenom_astronaute
 * @property string $nationalite
 * @property int $nombreMissions
 * @property string $poste
 * @property string $agence
 *
 * @package App\Models
 */
class VueAstronauteAgence extends Model
{
	protected $table = 'vue_nombre_missions';
	public $incrementing = false;
	public $timestamps = false;

    protected $casts = [
        'nom_astronaute' => 'string',      // Si nomAstro est une chaîne de caractères
        'prenom_astronaute' => 'string',   // Si prenomAstro est une chaîne de caractères
        'nationalite' => 'string',   // Si nombreMissions est un entier
        'nombreMissions' => 'int',   // Si dateDebut est de type date/ datetime
        'Poste' => 'string',     // Si dateFin est de type date/datetime (nullable)
        'agence' => 'string'         // Si agence est une chaîne de caractères
    ];
    

	protected $fillable = [
		'nom_astronaute',
		'prenom_astronaute',
		'nationalite',
		'nombreMissions',
		'Poste',
		'agence'
	];
}
