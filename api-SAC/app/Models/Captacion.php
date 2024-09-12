<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Captacion
 * 
 * @property int $id_captacion
 * @property string $nombre
 *
 * @package App\Models
 */
class Captacion extends Model
{
	protected $table = 'captacion';
	protected $primaryKey = 'id_captacion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_captacion' => 'int'
	];

	protected $fillable = [
		'nombre'
	];
}
