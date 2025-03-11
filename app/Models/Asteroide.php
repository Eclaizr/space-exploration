<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asteroide
 * 
 * @property string $nomObjet
 * @property string $composition
 * 
 * @property Objetceleste $objetceleste
 *
 * @package App\Models
 */
class Asteroide extends Model
{
	protected $table = 'asteroide';
	protected $primaryKey = 'nomObjet';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'composition'
	];

	public function objetceleste()
	{
		return $this->belongsTo(Objetceleste::class, 'nomObjet');
	}
}
