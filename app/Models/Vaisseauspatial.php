<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vaisseauspatial
 * 
 * @property int $idVaisseau
 * @property string $nomVaisseau
 * @property Carbon $premierVol
 * @property Carbon|null $dernierVol
 * @property string $etat
 * @property string $technologie
 * @property string $fabricant
 * @property int $idLancement
 * 
 * @property Sitelancement $sitelancement
 * @property Collection|Missionspatiale[] $missionspatiales
 *
 * @package App\Models
 */
class Vaisseauspatial extends Model
{
	protected $table = 'vaisseauspatial';
	protected $primaryKey = 'idVaisseau';
	public $timestamps = false;

	protected $casts = [
		'premierVol' => 'datetime',
		'dernierVol' => 'datetime',
		'idLancement' => 'int'
	];

	protected $fillable = [
		'nomVaisseau',
		'premierVol',
		'dernierVol',
		'etat',
		'technologie',
		'fabricant',
		'idLancement'
	];

	public function sitelancement()
	{
		return $this->belongsTo(Sitelancement::class, 'idLancement');
	}

	public function missionspatiales()
	{
		return $this->hasMany(Missionspatiale::class, 'idVaisseau');
	}
}
