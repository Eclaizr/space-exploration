<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Agencespatiale
 * 
 * @property string $nomAgence
 * @property string $pays
 * @property Carbon $dateCreation
 * @property float $budgetAnnuel
 * 
 * @property Collection|Affectation[] $affectations
 * @property Collection|Emploi[] $emplois
 * @property Collection|Objetceleste[] $objetcelestes
 *
 * @package App\Models
 */
class Agencespatiale extends Model
{
	protected $table = 'agencespatiale';
	protected $primaryKey = 'nomAgence';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'dateCreation' => 'datetime',
		'budgetAnnuel' => 'float'
	];

	protected $fillable = [
		'pays',
		'dateCreation',
		'budgetAnnuel'
	];

	public function affectations()
	{
		return $this->hasMany(Affectation::class, 'nomAgence');
	}

	public function emplois()
	{
		return $this->hasMany(Emploi::class, 'nomAgence');
	}

	public function objetcelestes()
	{
		return $this->hasMany(Objetceleste::class, 'agenceDecouvreuse');
	}
}
