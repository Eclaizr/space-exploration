<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VueMissionsAstronaute
 * 
 * @property string $nomAgence
 * @property int $nombreMissions
 *
 * @package App\Models
 */
class VueAgenceCompteMission extends Model
{
	protected $table = 'vue_agence_compte_missions';
	public $incrementing = false;
	public $timestamps = false;

    protected $casts = [
        'nomAgence' => 'string',      // Si nomAstro est une chaîne de caractères
        'nombreMissions' => 'int',   // Si dateDebut est de type date/ datetime
    ];
    

	protected $fillable = [
		'nomAgence',
		'nombreMissions',
	];
}
