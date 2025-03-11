<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MissionAttribution
 * 
 * @property int $idMission
 * @property int $idAstro
 * @property string $role
 * @property Carbon $dateParticipation
 * 
 * @property Missionspatiale $missionspatiale
 * @property Astronaute $astronaute
 *
 * @package App\Models
 */
class MissionAttribution extends Model
{
	protected $table = 'mission_attribution';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idMission' => 'int',
		'idAstro' => 'int',
		'dateParticipation' => 'datetime'
	];

	protected $fillable = [
		'role',
		'dateParticipation'
	];

	public function missionspatiale()
	{
		return $this->belongsTo(Missionspatiale::class, 'idMission');
	}

	public function astronaute()
	{
		return $this->belongsTo(Astronaute::class, 'idAstro');
	}
}
