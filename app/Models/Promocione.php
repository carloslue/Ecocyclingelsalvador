<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Promocione
 *
 * @property $id
 * @property $rutasID
 * @property $equipoID
 * @property $cantidad
 * @property $descripcion
 * @property $precio
 * @property $created_at
 * @property $updated_at
 *
 * @property Equipo $equipo
 * @property Ruta $ruta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Promocione extends Model
{
    
    static $rules = [
		'rutasID' => 'required',
		'equipoID' => 'required',
		'cantidad' => 'required',
		'descripcion' => 'required',
		'precio' => 'required',
        'fecha_vigencia' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['rutasID','equipoID','cantidad','descripcion','precio','fecha_vigencia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'equipoID');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ruta()
    {
        return $this->hasOne('App\Models\Ruta', 'id', 'rutasID');
    }
    

}
