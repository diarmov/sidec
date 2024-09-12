<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipio
 * 
 * @property int $idMunicipio
 * @property int $idEstado
 * @property string $nombre
 *
 * @package App\Models
 */
class Municipio extends Model
{
	protected $table = 'municipio';
	protected $primaryKey = 'idMunicipio';
	public $timestamps = false;

	protected $casts = [
		'idEstado' => 'int'
	];

	protected $fillable = [
		'idEstado',
		'nombre'
	];
}
