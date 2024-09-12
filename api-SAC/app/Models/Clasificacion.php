<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Clasificacion
 * 
 * @property int $idClasificacion
 * @property string $nombre
 *
 * @package App\Models
 */
class Clasificacion extends Model
{
	protected $table = 'clasificacion';
	protected $primaryKey = 'idClasificacion';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
