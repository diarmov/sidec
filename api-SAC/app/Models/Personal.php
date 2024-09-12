<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Personal
 * 
 * @property int $id_personal
 * @property string $nombre
 * @property string $puesto
 * @property int $idUsuario
 * @property int $baja
 *
 * @package App\Models
 */
class Personal extends Model
{
	protected $table = 'personal';
	protected $primaryKey = 'id_personal';
	public $timestamps = false;

	protected $casts = [
		'idUsuario' => 'int',
		'baja' => 'int'
	];

	protected $fillable = [
		'nombre',
		'puesto',
		'idUsuario',
		'baja'
	];
}
