<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatTipoVehiculo
 * 
 * @property int $id
 * @property string $tipo
 * @property int $inactivo
 *
 * @package App\Models
 */
class CatTipoVehiculo extends Model
{
	protected $table = 'cat_tipo_vehiculo';
	public $timestamps = false;

	protected $casts = [
		'inactivo' => 'int'
	];

	protected $fillable = [
		'tipo',
		'inactivo'
	];
}
