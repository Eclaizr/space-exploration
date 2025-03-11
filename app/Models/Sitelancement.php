<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sitelancement
 * 
 * @property int $idLancement
 * @property string $adresse
 * @property string $pays
 * 
 * @property Collection|Vaisseauspatial[] $vaisseauspatials
 *
 * @package App\Models
 */
class Sitelancement extends Model
{
	protected $table = 'sitelancement';
	protected $primaryKey = 'idLancement';
	public $timestamps = false;

	protected $fillable = [
		'adresse',
		'pays'
	];

	public function vaisseauspatials()
	{
		return $this->hasMany(Vaisseauspatial::class, 'idLancement');
	}
}
