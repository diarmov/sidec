<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatNivelSidespi
 * 
 * @property int $id
 * @property int $cat_nivel_id
 * @property string $nombre
 * @property int $inactivo
 *
 * @package App\Models
 */
class CatNivelSidespi extends Model
{
	protected $table = 'cat_nivel_sidespi';
	public $timestamps = false;

	protected $casts = [
		'cat_nivel_id' => 'int',
		'inactivo' => 'int'
	];

	protected $fillable = [
		'cat_nivel_id',
		'nombre',
		'inactivo'
	];
}
