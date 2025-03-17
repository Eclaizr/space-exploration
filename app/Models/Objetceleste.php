<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Objetceleste
 * 
 * @property int $id
 * @property string $nomObjet
 * @property float $distanceTerre
 * @property float $revolution
 * @property string $agenceDecouvreuse
 * @property int $anneeDecouverte
 * 
 * @property Agencespatiale $agencespatiale
 * @property Asteroide $asteroide
 * @property Planete $planete
 * @property Satellite $satellite
 * @property Collection|Vise[] $vises
 *
 * @package App\Models
 */
class Objetceleste extends Model
{
    protected $table = 'objetceleste';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $casts = [
        'distanceTerre' => 'float',
        'revolution' => 'float',
        'anneeDecouverte' => 'int'
    ];

    protected $fillable = [
        'nomObjet',
        'distanceTerre',
        'revolution',
        'agenceDecouvreuse',
        'anneeDecouverte'
    ];

    public function agencespatiale()
    {
        return $this->belongsTo(Agencespatiale::class, 'agenceDecouvreuse');
    }

    public function asteroide()
    {
        return $this->hasOne(Asteroide::class, 'nomObjet');
    }

    public function planete()
    {
        return $this->hasOne(Planete::class, 'nomObjet');
    }

    public function satellite()
    {
        return $this->hasOne(Satellite::class, 'nomObjet');
    }

    public function vises()
    {
        return $this->hasMany(Vise::class, 'nomObjet');
    }
}