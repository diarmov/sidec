<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fotobuzon
 * 
 * @property int $idfoto
 * @property int $idbuzon
 * @property string $foto
 *
 * @package App\Models
 */
class Fotobuzon extends Model
{
	protected $table = 'fotobuzon';
	protected $primaryKey = 'idfoto';
	public $timestamps = false;

	protected $casts = [
		'idbuzon' => 'int'
	];

	protected $fillable = [
		'idbuzon',
		'foto'
	];
}
