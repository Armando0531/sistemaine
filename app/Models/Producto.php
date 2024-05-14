<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $nombre_articulo
 * @property $descripcion
 * @property $id_categoria
 * @property $unidad_medida_id
 * @property $fecha_vencimiento
 * @property $clave_cucop
 * @property $cantidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Unidade $unidade
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'nombre_articulo' => 'required',
		'id_categoria' => 'required',
		'unidad_medida_id' => 'required',
		'clave_cucop' => 'required',
		'cantidad' => 'required|integer',
        'fecha_vencimiento' => 'nullable|date_format:Y-m-d',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_articulo','descripcion','id_categoria','unidad_medida_id','fecha_vencimiento','clave_cucop','cantidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'id_categoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unidade()
    {
        return $this->hasOne('App\Models\Unidade', 'id', 'unidad_medida_id');
    }
    public function entradas()
    {
        return $this->hasMany('App\Models\Entrada', 'clave_cucop', 'clave_cucop');
    }

    public function salidas()
    {
        return $this->hasMany('App\Models\Salida', 'clave_cucop', 'clave_cucop');
    }

}
