<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Areasadmin
 *
 * @property $id
 * @property $nombre_area
 * @property $nombre_encargado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Areasadmin extends Model
{
    protected $table = 'areasadmin';

    static $rules = [
		'nombre_area' => 'required',
		'nombre_encargado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_area','nombre_encargado'];



}
