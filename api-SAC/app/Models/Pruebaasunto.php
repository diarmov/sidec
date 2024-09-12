<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pruebaasunto
 * 
 * @property int $idPruebaasunto
 * @property int $idAsunto
 * @property string $archivo
 *
 * @package App\Models
 */
class Pruebaasunto extends Model
{
	protected $table = 'pruebaasunto';
	protected $primaryKey = 'idPruebaasunto';
	public $timestamps = false;

	protected $casts = [
		'idAsunto' => 'int'
	];

	protected $fillable = [
		'idAsunto',
		'archivo'
	];
}
