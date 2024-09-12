<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AsuntoAtencion
 * 
 * @property int $idAsuntoAtencion
 * @property int $idAsunto
 * @property int $idAtencion
 *
 * @package App\Models
 */
class AsuntoAtencion extends Model
{
	protected $table = 'asunto_atencion';
	protected $primaryKey = 'idAsuntoAtencion';
	public $timestamps = false;

	protected $casts = [
		'idAsunto' => 'int',
		'idAtencion' => 'int'
	];

	protected $fillable = [
		'idAsunto',
		'idAtencion'
	];
}
