<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vise
 * 
 * @property int $idMission
 * @property string $nomObjet
 * 
 * @property Missionspatiale $missionspatiale
 * @property Objetceleste $objetceleste
 *
 * @package App\Models
 */
class Vise extends Model
{
	protected $table = 'vise';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idMission' => 'int'
	];

	public function missionspatiale()
	{
		return $this->belongsTo(Missionspatiale::class, 'idMission');
	}

	public function objetceleste()
	{
		return $this->belongsTo(Objetceleste::class, 'nomObjet');
	}
}
