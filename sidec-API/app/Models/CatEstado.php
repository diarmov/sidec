<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatEstado
 * 
 * @property int $id
 * @property string $clave
 * @property string $nombre
 * @property string $abrev
 * @property bool $activo
 * 
 * @property Collection|Denuncium[] $denuncia
 *
 * @package App\Models
 */
class CatEstado extends Model
{
	protected $table = 'cat_estados';
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool'
	];

	protected $fillable = [
		'clave',
		'nombre',
		'abrev',
		'activo'
	];

	public function denuncia()
	{
		return $this->hasMany(Denuncium::class, 'id_estado');
	}
}
