<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Missionspatiale
 * 
 * @property int $idMission
 * @property string $nomMission
 * @property Carbon|null $dateDepart
 * @property Carbon|null $dateRetour
 * @property string $objectif
 * @property bool $estHabitee
 * @property string $statut
 * @property int $idVaisseau
 * 
 * @property Vaisseauspatial $vaisseauspatial
 * @property Collection|Experimente[] $experimentes
 * @property Collection|MissionAttribution[] $mission_attributions
 * @property Collection|Vise[] $vises
 *
 * @package App\Models
 */
class Missionspatiale extends Model
{
	protected $table = 'missionspatiale';
	protected $primaryKey = 'idMission';
	public $timestamps = false;

	protected $casts = [
		'dateDepart' => 'datetime',
		'dateRetour' => 'datetime',
		'estHabitee' => 'bool',
		'idVaisseau' => 'int'
	];

	protected $fillable = [
		'nomMission',
		'dateDepart',
		'dateRetour',
		'objectif',
		'estHabitee',
		'statut',
		'idVaisseau'
	];

	public function vaisseauspatial()
	{
		return $this->belongsTo(Vaisseauspatial::class, 'idVaisseau');
	}

	public function experimentes()
	{
		return $this->hasMany(Experimente::class, 'idMission');
	}

	public function mission_attributions()
	{
		return $this->hasMany(MissionAttribution::class, 'idMission');
	}

	public function vises()
	{
		return $this->hasMany(Vise::class, 'idMission');
	}
}
