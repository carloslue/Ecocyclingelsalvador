<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ventasfinale
 *
 * @property $id
 * @property $n_factura_inicio
 * @property $n_factura_final
 * @property $n_caja
 * @property $ventas_internas_exentas
 * @property $ventas_internas_locales
 * @property $exportaciones
 * @property $total_ventas
 * @property $ventas_a_cuenta_terceros
 * @property $iva_retenido
 * @property $iva_percibido
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ventasfinale extends Model
{
    
    static $rules = [
		'dia'=>'required',
		'n_factura_inicio' => 'required',
		'n_factura_final' => 'required',
		'n_caja' => 'required',
		'ventas_internas_exentas' => 'required',
		'ventas_internas_locales' => 'required',
		'exportaciones' => 'required',
		'total_ventas' => 'required',
		'ventas_a_cuenta_terceros' => 'required',
		'iva_retenido' => 'required',
		'iva_percibido' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dia','n_factura_inicio','n_factura_final','n_caja','ventas_internas_exentas','ventas_internas_locales','exportaciones','ventas_a_cuenta_terceros','iva_retenido','iva_percibido'];



}
