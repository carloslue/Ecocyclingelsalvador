<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Informacion
 *
 * @property $id
 * @property $mision
 * @property $vision
 * @property $general
 * @property $epecifico
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Informacion extends Model
{
    
    static $rules = [
		'mision' => 'required',
		'vision' => 'required',
	
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['mision','vision'];



}
