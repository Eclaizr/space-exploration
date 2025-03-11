<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Satellite
 * 
 * @property string $nomObjet
 * @property bool $atmosphere
 * @property string $nomObjetPlanete
 * 
 * @property Objetceleste $objetceleste
 * @property Planete $planete
 *
 * @package App\Models
 */
class Satellite extends Model
{
	protected $table = 'satellite';
	protected $primaryKey = 'nomObjet';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'atmosphere' => 'bool'
	];

	protected $fillable = [
		'atmosphere',
		'nomObjetPlanete'
	];

	public function objetceleste()
	{
		return $this->belongsTo(Objetceleste::class, 'nomObjet');
	}

	public function planete()
	{
		return $this->belongsTo(Planete::class, 'nomObjetPlanete');
	}
}
