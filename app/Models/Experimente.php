<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Experimente
 * 
 * @property int $idMission
 * @property int $idExperience
 * 
 * @property Missionspatiale $missionspatiale
 * @property Experiencescientifique $experiencescientifique
 *
 * @package App\Models
 */
class Experimente extends Model
{
	protected $table = 'experimente';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idMission' => 'int',
		'idExperience' => 'int'
	];

	public function missionspatiale()
	{
		return $this->belongsTo(Missionspatiale::class, 'idMission');
	}

	public function experiencescientifique()
	{
		return $this->belongsTo(Experiencescientifique::class, 'idExperience');
	}
}
