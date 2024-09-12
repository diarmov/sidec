<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Debateforo
 * 
 * @property int $idDebateforo
 * @property int $idUsuario
 * @property int $estatus
 * @property string $texto
 * @property int $idTemaforo
 *
 * @package App\Models
 */
class Debateforo extends Model
{
	protected $table = 'debateforo';
	protected $primaryKey = 'idDebateforo';
	public $timestamps = false;

	protected $casts = [
		'idUsuario' => 'int',
		'estatus' => 'int',
		'idTemaforo' => 'int'
	];

	protected $fillable = [
		'idUsuario',
		'estatus',
		'texto',
		'idTemaforo'
	];
}
