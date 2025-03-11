<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Experiencescientifique
 * 
 * @property int $idExperience
 * @property string $nomExperience
 * @property string $typeExperience
 * @property string $resultats
 * 
 * @property Collection|Experimente[] $experimentes
 *
 * @package App\Models
 */
class Experiencescientifique extends Model
{
	protected $table = 'experiencescientifique';
	protected $primaryKey = 'idExperience';
	public $timestamps = false;

	protected $fillable = [
		'nomExperience',
		'typeExperience',
		'resultats'
	];

	public function experimentes()
	{
		return $this->hasMany(Experimente::class, 'idExperience');
	}
}
