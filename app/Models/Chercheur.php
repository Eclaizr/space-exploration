<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chercheur
 * 
 * @property int $idChercheur
 * @property string $nationalite
 * @property string $nomChercheur
 * @property string $prenomChercheur
 * @property Carbon $dateNaissanceChercheur
 * @property string $statut
 * 
 * @property Collection|Emploi[] $emplois
 *
 * @package App\Models
 */
class Chercheur extends Model
{
	protected $table = 'chercheur';
	protected $primaryKey = 'idChercheur';
	public $timestamps = false;

	protected $casts = [
		'dateNaissanceChercheur' => 'datetime'
	];

	protected $fillable = [
		'nationalite',
		'nomChercheur',
		'prenomChercheur',
		'dateNaissanceChercheur',
		'statut'
	];

	public function emplois()
	{
		return $this->hasMany(Emploi::class, 'idChercheur');
	}
}
