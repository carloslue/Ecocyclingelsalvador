<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $edad
 * @property $dui
 * @property $telefono
 * @property $rol
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Reserva[] $reservas
 * @property Reservaspromo[] $reservaspromos
 * @property Reservaspromo[] $reservaspromos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Model
{
    
    static $rules = [
		'name' => 'required',
		'edad' => 'required',
		'dui' => 'required',
		'telefono' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','edad','dui','telefono','rol','email'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservas()
    {
        return $this->hasMany('App\Models\Reserva', 'clienteID', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservaspromos()
    {
        return $this->hasMany('App\Models\Reservaspromo', 'clienteID', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   /* public function reservaspromos()
    {
        return $this->hasMany('App\Models\Reservaspromo', 'clienteID', 'id');
    }*/
    

}
