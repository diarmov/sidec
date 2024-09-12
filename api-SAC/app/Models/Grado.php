<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Grado
 * 
 * @property int $idGrado
 * @property string $nombre
 *
 * @package App\Models
 */
class Grado extends Model
{
	protected $table = 'grado';
	protected $primaryKey = 'idGrado';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
