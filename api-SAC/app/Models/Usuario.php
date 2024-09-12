<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $idUsuario
 * @property string $username
 * @property string $passwor
 * @property string $mail
 * @property int $tipoUsuario
 * @property string $nombre
 * @property string $puesto
 * @property int $idDepto
 * @property int $baja
 * @property string $iniciales
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'idUsuario';
	public $timestamps = false;

	protected $casts = [
		'tipoUsuario' => 'int',
		'idDepto' => 'int',
		'baja' => 'int'
	];

	protected $fillable = [
		'username',
		'passwor',
		'mail',
		'tipoUsuario',
		'nombre',
		'puesto',
		'idDepto',
		'baja',
		'iniciales'
	];
}
