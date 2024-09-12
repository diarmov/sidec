<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 * 
 * @property int $idEstado
 * @property string $nombre
 *
 * @package App\Models
 */
class Estado extends Model
{
	protected $table = 'estado';
	protected $primaryKey = 'idEstado';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
