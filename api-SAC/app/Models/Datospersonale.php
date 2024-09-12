<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Datospersonale
 * 
 * @property int $idDatospersonales
 * @property int $edad
 * @property string $nombre
 * @property string $apPat
 * @property string $apMat
 * @property int $idGrado
 * @property string $telefono
 * @property string $domicilio
 * @property int $idUsuario
 * @property int $idMunicipio
 * @property string $localidad
 * @property string $sexo
 * @property string $ocupacion
 * @property int $iniciales
 *
 * @package App\Models
 */
class Datospersonale extends Model
{
	protected $table = 'datospersonales';
	protected $primaryKey = 'idDatospersonales';
	public $timestamps = false;

	protected $casts = [
		'edad' => 'int',
		'idGrado' => 'int',
		'idUsuario' => 'int',
		'idMunicipio' => 'int',
		'iniciales' => 'int'
	];

	protected $fillable = [
		'edad',
		'nombre',
		'apPat',
		'apMat',
		'idGrado',
		'telefono',
		'domicilio',
		'idUsuario',
		'idMunicipio',
		'localidad',
		'sexo',
		'ocupacion',
		'iniciales'
	];
}
