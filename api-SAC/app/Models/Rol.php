<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * 
 * @property int $idRol
 * @property string $nombre
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'rol';
	protected $primaryKey = 'idRol';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
