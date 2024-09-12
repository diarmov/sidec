<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Programa
 * 
 * @property int $idPrograma
 * @property string $nombre
 *
 * @package App\Models
 */
class Programa extends Model
{
	protected $table = 'programa';
	protected $primaryKey = 'idPrograma';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
