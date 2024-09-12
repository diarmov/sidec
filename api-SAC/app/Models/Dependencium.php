<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dependencium
 * 
 * @property int $idDependencia
 * @property int $ambito
 * @property string $nombre
 * @property string $nombrecorto
 * @property int $baja
 *
 * @package App\Models
 */
class Dependencium extends Model
{
	protected $table = 'dependencia';
	protected $primaryKey = 'idDependencia';
	public $timestamps = false;

	protected $casts = [
		'ambito' => 'int',
		'baja' => 'int'
	];

	protected $fillable = [
		'ambito',
		'nombre',
		'nombrecorto',
		'baja'
	];
}
