<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservaspromo
 *
 * @property $id
 * @property $clienteID
 * @property $promocionID
 * @property $fecha_visita
 * @property $hora
 * @property $created_at
 * @property $updated_at
 *
 * @property Promocione $promocione
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reservaspromo extends Model
{
    
    static $rules = [
		'clienteID' => 'required',
		'promocionID' => 'required',
		'fecha_visita' => 'required',
		'hora' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['clienteID','promocionID','fecha_visita','hora'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function promocione()
    {
        return $this->hasOne('App\Models\Promocione', 'id', 'promocionID');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'clienteID');
    }
    

}
