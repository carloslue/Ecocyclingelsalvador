<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ruta
 *
 * @property $id
 * @property $imagen
 * @property $descripcion_rutas
 * @property $created_at
 * @property $updated_at
 *
 * @property Promocione[] $promociones
 * @property Reserva[] $reservas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ruta extends Model
{
    
    static $rules = [
		'imagen' => 'required',
		'descripcion_rutas' => 'required',
        'titulo' => 'required',
        'costo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['imagen','descripcion_rutas'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promociones()
    {
        return $this->hasMany('App\Models\Promocione', 'rutasID', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservas()
    {
        return $this->hasMany('App\Models\Reserva', 'rutaID', 'id');
    }
    

}
