<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Posicionbuzones2
 * 
 * @property int $id
 * @property string $nombre
 * @property string $direccion
 * @property string $lat
 * @property string $lng
 * @property string $tipo
 * @property int $idmunicipio
 *
 * @package App\Models
 */
class Posicionbuzones2 extends Model
{
	protected $table = 'posicionbuzones2';
	public $timestamps = false;

	protected $casts = [
		'idmunicipio' => 'int'
	];

	protected $fillable = [
		'nombre',
		'direccion',
		'lat',
		'lng',
		'tipo',
		'idmunicipio'
	];
}
