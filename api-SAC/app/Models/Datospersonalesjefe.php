<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Datospersonalesjefe
 * 
 * @property int $idDatospersonales
 * @property int $edad
 * @property string $nombre
 * @property string $telefono
 * @property string $domicilio
 * @property string $localidad
 * @property int $idAsunto
 * @property int $idMunicipio
 * @property int $idGrado
 * @property string $correo
 * @property string $ocupacion
 * @property string $sexo
 * @property string $email
 *
 * @package App\Models
 */
class Datospersonalesjefe extends Model
{
	protected $table = 'datospersonalesjefes';
	protected $primaryKey = 'idDatospersonales';
	public $timestamps = false;

	protected $casts = [
		'edad' => 'int',
		'idAsunto' => 'int',
		'idMunicipio' => 'int',
		'idGrado' => 'int'
	];

	protected $fillable = [
		'edad',
		'nombre',
		'telefono',
		'domicilio',
		'localidad',
		'idAsunto',
		'idMunicipio',
		'idGrado',
		'correo',
		'ocupacion',
		'sexo',
		'email'
	];
}
