<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VueGestionnaireMission
 * 
 * @property int $idMission
 * @property string $nomMission
 * @property Carbon|null $dateDepart
 * @property Carbon|null $dateRetour
 * @property string $statut
 * @property string $objectif
 * @property bool $estHabitee
 *
 * @package App\Models
 */
class VueGestionnaireMission extends Model
{
	protected $table = 'vue_gestionnaire_missions';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idMission' => 'int',
		'dateDepart' => 'datetime',
		'dateRetour' => 'datetime',
		'estHabitee' => 'bool'
	];

	protected $fillable = [
		'idMission',
		'nomMission',
		'dateDepart',
		'dateRetour',
		'statut',
		'objectif',
		'estHabitee'
	];
}
