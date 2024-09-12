<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Noticium
 * 
 * @property int $id_noticia
 * @property Carbon $fecha
 * @property string $titulo
 * @property string $texto
 * @property string $fotografia
 *
 * @package App\Models
 */
class Noticium extends Model
{
	protected $table = 'noticia';
	protected $primaryKey = 'id_noticia';
	public $timestamps = false;

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'fecha',
		'titulo',
		'texto',
		'fotografia'
	];
}
