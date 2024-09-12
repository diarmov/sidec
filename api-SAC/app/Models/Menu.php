<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu
 * 
 * @property int $idMenu
 * @property int $posicion
 * @property int $depende
 * @property string $nombre
 * @property string $url
 *
 * @package App\Models
 */
class Menu extends Model
{
	protected $table = 'menu';
	protected $primaryKey = 'idMenu';
	public $timestamps = false;

	protected $casts = [
		'posicion' => 'int',
		'depende' => 'int'
	];

	protected $fillable = [
		'posicion',
		'depende',
		'nombre',
		'url'
	];
}
