<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProgramaLineamiento
 * 
 * @property int $id_programa
 * @property int $id_dependencia
 * @property string $nombre
 * @property string $tipo_apoyo
 * @property string $poblacion_objetivo
 * @property string $requisitos
 * @property string $reglas_operacion
 * @property int $tipo
 * @property int $prioridad
 *
 * @package App\Models
 */
class ProgramaLineamiento extends Model
{
	protected $table = 'programa_lineamiento';
	protected $primaryKey = 'id_programa';
	public $timestamps = false;

	protected $casts = [
		'id_dependencia' => 'int',
		'tipo' => 'int',
		'prioridad' => 'int'
	];

	protected $fillable = [
		'id_dependencia',
		'nombre',
		'tipo_apoyo',
		'poblacion_objetivo',
		'requisitos',
		'reglas_operacion',
		'tipo',
		'prioridad'
	];
}
