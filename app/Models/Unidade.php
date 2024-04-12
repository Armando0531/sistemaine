<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unidade
 *
 * @property $id
 * @property $unidad_medida
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Unidade extends Model
{
    
    static $rules = [
		'unidad_medida' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['unidad_medida'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'unidad_medida_id', 'id');
    }
    

}
