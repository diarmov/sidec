<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id_usuario
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $nombre
 * @property string $puesto
 * @property int $activo
 * 
 * @property Collection|ClasificacionDenuncium[] $clasificacion_denuncia
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';
	protected $primaryKey = 'id_usuario';
	public $timestamps = false;

	protected $casts = [
		'activo' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'email',
		'nombre',
		'puesto',
		'activo'
	];

	public function clasificacion_denuncia()
	{
		return $this->hasMany(ClasificacionDenuncium::class, 'id_usuario');
	}
}
