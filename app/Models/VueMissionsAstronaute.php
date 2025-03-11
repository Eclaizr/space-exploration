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
 * @property int $idAstro
 * @property string $nomAstro
 * @property string $prenomAstro
 * @property string $nomMission
 * @property Carbon|null $dateDepart
 * @property Carbon|null $dateRetour
 * @property string $statut
 *
 * @package App\Models
 */
class VueMissionsAstronaute extends Model
{
	protected $table = 'vue_missions_astronaute';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idAstro' => 'int',
		'dateDepart' => 'datetime',
		'dateRetour' => 'datetime'
	];

	protected $fillable = [
		'idAstro',
		'nomAstro',
		'prenomAstro',
		'nomMission',
		'dateDepart',
		'dateRetour',
		'statut'
	];
}
