<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AsuntoDictaman
 * 
 * @property int $idAsuntoDictamen
 * @property int $idDictamen
 * @property int $idAsunto
 *
 * @package App\Models
 */
class AsuntoDictaman extends Model
{
	protected $table = 'asunto_dictamen';
	protected $primaryKey = 'idAsuntoDictamen';
	public $timestamps = false;

	protected $casts = [
		'idDictamen' => 'int',
		'idAsunto' => 'int'
	];

	protected $fillable = [
		'idDictamen',
		'idAsunto'
	];
}
