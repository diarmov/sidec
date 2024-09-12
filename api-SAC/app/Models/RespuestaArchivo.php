<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RespuestaArchivo
 * 
 * @property int $idArchivoRespuesta
 * @property string $archivo
 * @property int $idAsunto
 * @property int $ve_promovente
 *
 * @package App\Models
 */
class RespuestaArchivo extends Model
{
	protected $table = 'respuesta_archivo';
	protected $primaryKey = 'idArchivoRespuesta';
	public $timestamps = false;

	protected $casts = [
		'idAsunto' => 'int',
		've_promovente' => 'int'
	];

	protected $fillable = [
		'archivo',
		'idAsunto',
		've_promovente'
	];
}
