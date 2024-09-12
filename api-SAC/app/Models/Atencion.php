<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Atencion
 * 
 * @property int $idAtencion
 * @property int $idAsunto
 * @property string $noOficio
 * @property string $expediente
 * @property string $asunto
 * @property string $presente
 * @property string $atencion
 * @property string $texto
 * @property string $copia
 * @property Carbon $fecha
 * @property Carbon $fecharecordatorio
 * @property Carbon $fechaacuse
 *
 * @package App\Models
 */
class Atencion extends Model
{
	protected $table = 'atencion';
	protected $primaryKey = 'idAtencion';
	public $timestamps = false;

	protected $casts = [
		'idAsunto' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecharecordatorio',
		'fechaacuse'
	];

	protected $fillable = [
		'idAsunto',
		'noOficio',
		'expediente',
		'asunto',
		'presente',
		'atencion',
		'texto',
		'copia',
		'fecha',
		'fecharecordatorio',
		'fechaacuse'
	];
}
