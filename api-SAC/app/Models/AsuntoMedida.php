<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AsuntoMedida
 * 
 * @property int $id_asunto_medida
 * @property int $idAsunto
 * @property int $id_medida_aplicada
 *
 * @package App\Models
 */
class AsuntoMedida extends Model
{
	protected $table = 'asunto_medida';
	protected $primaryKey = 'id_asunto_medida';
	public $timestamps = false;

	protected $casts = [
		'idAsunto' => 'int',
		'id_medida_aplicada' => 'int'
	];

	protected $fillable = [
		'idAsunto',
		'id_medida_aplicada'
	];
}
