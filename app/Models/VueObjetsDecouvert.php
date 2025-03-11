<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VueObjetsDecouvert
 * 
 * @property string $nomObjet
 * @property float $distanceTerre
 * @property int $anneeDecouverte
 * @property float $revolution
 * @property string $agenceDecouvreuse
 *
 * @package App\Models
 */
class VueObjetsDecouvert extends Model
{
	protected $table = 'vue_objets_decouverts';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'distanceTerre' => 'float',
		'anneeDecouverte' => 'int',
		'revolution' => 'float'
	];

	protected $fillable = [
		'nomObjet',
		'distanceTerre',
		'anneeDecouverte',
		'revolution',
		'agenceDecouvreuse'
	];
}
