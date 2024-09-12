<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dictaman
 * 
 * @property int $idDictamen
 * @property int $idAsunto
 * @property Carbon $fecha
 * @property string $texto
 * @property string $copia
 * @property string $atendio
 * @property int $idEmitio
 *
 * @package App\Models
 */
class Dictaman extends Model
{
	protected $table = 'dictamen';
	protected $primaryKey = 'idDictamen';
	public $timestamps = false;

	protected $casts = [
		'idAsunto' => 'int',
		'idEmitio' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'idAsunto',
		'fecha',
		'texto',
		'copia',
		'atendio',
		'idEmitio'
	];
}
