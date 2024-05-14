<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entrada
 *
 * @property $id
 * @property $clave_cucop
 * @property $id_proveedor
 * @property $cantidad_entrada
 * @property $fecha_entrada
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @property Proveedore $proveedore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Entrada extends Model
{
    
    static $rules = [
		'clave_cucop' => 'required',
		'id_proveedor' => 'required',
		'cantidad_entrada' => 'required',
		'fecha_entrada' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['clave_cucop','id_proveedor','cantidad_entrada','fecha_entrada'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'clave_cucop', 'clave_cucop');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'id_proveedor');
    }
    

}
