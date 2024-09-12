<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OtrasPrueba
 * 
 * @property int $id_otras_pruebas
 * @property int $idAsunto
 * @property string $descripcion
 *
 * @package App\Models
 */
class OtrasPrueba extends Model
{
	protected $table = 'otras_pruebas';
	protected $primaryKey = 'id_otras_pruebas';
	public $timestamps = false;

	protected $casts = [
		'idAsunto' => 'int'
	];

	protected $fillable = [
		'idAsunto',
		'descripcion'
	];
}
