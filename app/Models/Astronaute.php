<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Astronaute
 * 
 * @property int $idAstro
 * @property string $nomAstro
 * @property string $prenomAstro
 * @property Carbon $dateNaissanceAstro
 * @property string $nationalite
 * @property int $nombreMissions
 * @property string $Poste
 * @property string $statut
 * 
 * @property Collection|Affectation[] $affectations
 * @property Collection|MissionAttribution[] $mission_attributions
 *
 * @package App\Models
 */
class Astronaute extends Model
{
	protected $table = 'exploration_spatiale.astronaute';
	protected $primaryKey = 'idAstro';
	public $timestamps = false;

	protected $casts = [
		'nomAstro' => 'string',
		'prenomAstro' => 'string',
		'dateNaissanceAstro' => 'datetime',
		'nationalite' => 'string',
		'nombreMissions' => 'int',
		'Poste' => 'string',
		'statut' => 'string',
	];

	protected $fillable = [
		'nomAstro',
		'prenomAstro',
		'dateNaissanceAstro',
		'nationalite',
		'nombreMissions',
		'Poste',
		'statut'
	];

	public function affectations()
	{
		return $this->hasMany(Affectation::class, 'idAstro');
	}

	public function mission_attributions()
	{
		return $this->hasMany(MissionAttribution::class, 'idAstro');
	}
}
