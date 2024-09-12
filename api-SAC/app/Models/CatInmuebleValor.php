<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatInmuebleValor
 * 
 * @property int $id
 * @property string $documento
 * @property int $inactivo
 *
 * @package App\Models
 */
class CatInmuebleValor extends Model
{
	protected $table = 'cat_inmueble_valor';
	public $timestamps = false;

	protected $casts = [
		'inactivo' => 'int'
	];

	protected $fillable = [
		'documento',
		'inactivo'
	];
}
