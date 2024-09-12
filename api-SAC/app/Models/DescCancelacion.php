<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DescCancelacion
 * 
 * @property int $id
 * @property int $idAsunto
 * @property string $descripcion
 *
 * @package App\Models
 */
class DescCancelacion extends Model
{
	protected $table = 'desc_cancelacion';
	public $timestamps = false;

	protected $casts = [
		'idAsunto' => 'int'
	];

	protected $fillable = [
		'idAsunto',
		'descripcion'
	];
}
