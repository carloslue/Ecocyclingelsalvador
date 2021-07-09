<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Equipo
 *
 * @property $id
 * @property $cantidad
 * @property $descripcion_equipo
 * @property $created_at
 * @property $updated_at
 *
 * @property Promocione[] $promociones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Equipo extends Model
{
    
    static $rules = [
		'cantidad' => 'required',
		'descripcion_equipo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cantidad','descripcion_equipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promociones()
    {
        return $this->hasMany('App\Models\Promocione', 'equipoID', 'id');
    }
    

}
