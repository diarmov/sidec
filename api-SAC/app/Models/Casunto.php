<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Casunto
 * 
 * @property int $idCasuntos
 * @property string $nombre
 *
 * @package App\Models
 */
class Casunto extends Model
{
	protected $table = 'casuntos';
	protected $primaryKey = 'idCasuntos';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
