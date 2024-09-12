<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RespuestaDep
 * 
 * @property int $idRespuestaDep
 * @property int $idAsunto
 * @property Carbon $fecha_respuesta
 * @property string $acciones
 * @property string $oficiodoc
 * @property string $num_oficio
 * @property int $ve_promovente
 *
 * @package App\Models
 */
class RespuestaDep extends Model
{
	protected $table = 'respuesta_dep';
	protected $primaryKey = 'idRespuestaDep';
	public $timestamps = false;

	protected $casts = [
		'idAsunto' => 'int',
		've_promovente' => 'int'
	];

	protected $dates = [
		'fecha_respuesta'
	];

	protected $fillable = [
		'idAsunto',
		'fecha_respuesta',
		'acciones',
		'oficiodoc',
		'num_oficio',
		've_promovente'
	];
}
