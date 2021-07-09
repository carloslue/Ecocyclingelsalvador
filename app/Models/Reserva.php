<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reserva
 *
 * @property $id
 * @property $clienteID
 * @property $rutaID
 * @property $fecha
 * @property $hora
 * @property $cantidad
 * @property $telefono
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Ruta $ruta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reserva extends Model
{
    
    static $rules = [
		'clienteID' => 'required',
		'rutaID' => 'required',
		'fecha' => 'required',
		'hora' => 'required',
		'cantidad' => 'required',
		'telefono' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['clienteID','rutaID','fecha','hora','cantidad','telefono'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'clienteID');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ruta()
    {
        return $this->hasOne('App\Models\Ruta', 'id', 'rutaID');
    }
    

}
