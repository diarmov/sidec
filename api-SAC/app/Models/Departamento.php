<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Departamento
 * 
 * @property int $idDepto
 * @property string $nombre
 *
 * @package App\Models
 */
class Departamento extends Model
{
	protected $table = 'departamento';
	protected $primaryKey = 'idDepto';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
