<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Temaforo
 * 
 * @property int $idTemaforo
 * @property string $tema
 *
 * @package App\Models
 */
class Temaforo extends Model
{
	protected $table = 'temaforo';
	protected $primaryKey = 'idTemaforo';
	public $timestamps = false;

	protected $fillable = [
		'tema'
	];
}
