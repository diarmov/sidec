<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Promovente
 * 
 * @property int $idPromovente
 * @property int $idAsunto
 * @property string $noOficio
 * @property string $asunto
 * @property string $texto
 * @property string $copia
 * @property string $expediente
 * @property string $presente
 * @property Carbon $fecha
 *
 * @package App\Models
 */
class Promovente extends Model
{
	protected $table = 'promovente';
	protected $primaryKey = 'idPromovente';
	public $timestamps = false;

	protected $casts = [
		'idAsunto' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'idAsunto',
		'noOficio',
		'asunto',
		'texto',
		'copia',
		'expediente',
		'presente',
		'fecha'
	];
}
