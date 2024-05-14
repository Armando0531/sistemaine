<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Salida
 *
 * @property $id
 * @property $clave_cucop
 * @property $id_usuario
 * @property $id_area_administrativa
 * @property $cantidad_salida
 * @property $fecha_salida
 * @property $created_at
 * @property $updated_at
 *
 * @property Areasadmin $areasadmin
 * @property Producto $producto
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Salida extends Model
{
    
    static $rules = [
		'clave_cucop' => 'required',
		'id_usuario' => 'required',
		'id_area_administrativa' => 'required',
		'cantidad_salida' => 'required',
		'fecha_salida' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['clave_cucop','id_usuario','id_area_administrativa','cantidad_salida','fecha_salida'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function areasadmin()
    {
        return $this->hasOne('App\Models\Areasadmin', 'id', 'id_area_administrativa');
    }
    
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
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usuario');
    }
    

}
