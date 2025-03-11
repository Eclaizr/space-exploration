<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Emploi
 * 
 * @property string $nomAgence
 * @property int $idChercheur
 * 
 * @property Agencespatiale $agencespatiale
 * @property Chercheur $chercheur
 *
 * @package App\Models
 */
class Emploi extends Model
{
	protected $table = 'emploi';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idChercheur' => 'int'
	];

	public function agencespatiale()
	{
		return $this->belongsTo(Agencespatiale::class, 'nomAgence');
	}

	public function chercheur()
	{
		return $this->belongsTo(Chercheur::class, 'idChercheur');
	}
}
