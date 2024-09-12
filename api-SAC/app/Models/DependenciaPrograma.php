<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DependenciaPrograma
 * 
 * @property int $id_dep_prog
 * @property int $idDependencia
 * @property int $idPrograma
 *
 * @package App\Models
 */
class DependenciaPrograma extends Model
{
	protected $table = 'dependencia_programa';
	protected $primaryKey = 'id_dep_prog';
	public $timestamps = false;

	protected $casts = [
		'idDependencia' => 'int',
		'idPrograma' => 'int'
	];

	protected $fillable = [
		'idDependencia',
		'idPrograma'
	];
}
