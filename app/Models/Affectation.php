<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Affectation
 * 
 * @property string $nomAgence
 * @property int $idAstro
 * @property Carbon $dateDebut
 * @property Carbon|null $dateFin
 * 
 * @property Agencespatiale $agencespatiale
 * @property Astronaute $astronaute
 *
 * @package App\Models
 */
class Affectation extends Model
{
	protected $table = 'exploration_spatiale.affectation';
	protected $primaryKey = 'idAstro';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idAstro' => 'int',
		'dateDebut' => 'datetime',
		'dateFin' => 'datetime'
	];

	protected $fillable = [
		'dateFin'
	];

	public function agencespatiale()
	{
		return $this->belongsTo(Agencespatiale::class, 'nomAgence');
	}

	public function astronaute()
	{
		return $this->belongsTo(Astronaute::class, 'idAstro');
	}
}
