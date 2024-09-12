<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asuntounidadmedica
 * 
 * @property int $idasuntoUnidadMedica
 * @property int $idAsunto
 * @property int $idUnidadMedica
 *
 * @package App\Models
 */
class Asuntounidadmedica extends Model
{
	protected $table = 'asuntounidadmedica';
	protected $primaryKey = 'idasuntoUnidadMedica';
	public $timestamps = false;

	protected $casts = [
		'idAsunto' => 'int',
		'idUnidadMedica' => 'int'
	];

	protected $fillable = [
		'idAsunto',
		'idUnidadMedica'
	];
}
