<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Galerium
 * 
 * @property int $idGaleria
 * @property string $titulo
 * @property string $texto
 * @property string $ruta
 *
 * @package App\Models
 */
class Galerium extends Model
{
	protected $table = 'galeria';
	protected $primaryKey = 'idGaleria';
	public $timestamps = false;

	protected $fillable = [
		'titulo',
		'texto',
		'ruta'
	];
}
