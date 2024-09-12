<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Menurol
 * 
 * @property int $idmenuRol
 * @property int $idRol
 * @property int $idMenu
 *
 * @package App\Models
 */
class Menurol extends Model
{
	protected $table = 'menurol';
	protected $primaryKey = 'idmenuRol';
	public $timestamps = false;

	protected $casts = [
		'idRol' => 'int',
		'idMenu' => 'int'
	];

	protected $fillable = [
		'idRol',
		'idMenu'
	];
}
