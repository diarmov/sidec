<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Correodep
 * 
 * @property int $idCorreoDep
 * @property int $idDependencia
 * @property string $correo
 *
 * @package App\Models
 */
class Correodep extends Model
{
	protected $table = 'correodep';
	protected $primaryKey = 'idCorreoDep';
	public $timestamps = false;

	protected $casts = [
		'idDependencia' => 'int'
	];

	protected $fillable = [
		'idDependencia',
		'correo'
	];
}
