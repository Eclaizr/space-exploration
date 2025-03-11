<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Planete
 * 
 * @property string $nomObjet
 * @property string $typePlanete
 * @property string|null $environnement
 * @property float|null $habitabilite
 * @property bool $atmospherePlanete
 * @property float|null $temperatureSurface
 * 
 * @property Objetceleste $objetceleste
 * @property Collection|Satellite[] $satellites
 *
 * @package App\Models
 */
class Planete extends Model
{
	protected $table = 'planete';
	protected $primaryKey = 'nomObjet';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'habitabilite' => 'float',
		'atmospherePlanete' => 'bool',
		'temperatureSurface' => 'float'
	];

	protected $fillable = [
		'typePlanete',
		'environnement',
		'habitabilite',
		'atmospherePlanete',
		'temperatureSurface'
	];

	public function objetceleste()
	{
		return $this->belongsTo(Objetceleste::class, 'nomObjet');
	}

	public function satellites()
	{
		return $this->hasMany(Satellite::class, 'nomObjetPlanete');
	}
}
