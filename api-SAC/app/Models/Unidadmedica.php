<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unidadmedica
 * 
 * @property int $idunidadmedica
 * @property string $unidadmedica
 * @property int $baja
 *
 * @package App\Models
 */
class Unidadmedica extends Model
{
	protected $table = 'unidadmedica';
	protected $primaryKey = 'idunidadmedica';
	public $timestamps = false;

	protected $casts = [
		'baja' => 'int'
	];

	protected $fillable = [
		'unidadmedica',
		'baja'
	];
}
