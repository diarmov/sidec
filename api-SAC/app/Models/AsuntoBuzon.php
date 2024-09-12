<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AsuntoBuzon
 * 
 * @property int $id_asunto_buzon
 * @property int $idAsunto
 * @property int $id_buzon
 * @property int $tipo
 *
 * @package App\Models
 */
class AsuntoBuzon extends Model
{
	protected $table = 'asunto_buzon';
	protected $primaryKey = 'id_asunto_buzon';
	public $timestamps = false;

	protected $casts = [
		'idAsunto' => 'int',
		'id_buzon' => 'int',
		'tipo' => 'int'
	];

	protected $fillable = [
		'idAsunto',
		'id_buzon',
		'tipo'
	];
}
