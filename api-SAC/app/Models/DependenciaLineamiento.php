<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DependenciaLineamiento
 * 
 * @property int $id_dependencia
 * @property string $nombre_dep
 * @property string $nombrecompleto
 *
 * @package App\Models
 */
class DependenciaLineamiento extends Model
{
	protected $table = 'dependencia_lineamiento';
	protected $primaryKey = 'id_dependencia';
	public $timestamps = false;

	protected $fillable = [
		'nombre_dep',
		'nombrecompleto'
	];
}
