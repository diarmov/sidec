<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatMunicipio
 * 
 * @property int $id
 * @property int $estado_id
 * @property string $clave
 * @property string $nombre
 * @property bool $activo
 * 
 * @property Collection|Denuncium[] $denuncia
 *
 * @package App\Models
 */
class CatMunicipio extends Model
{
	protected $table = 'cat_municipios';
	public $timestamps = false;

	protected $casts = [
		'estado_id' => 'int',
		'activo' => 'bool'
	];

	protected $fillable = [
		'estado_id',
		'clave',
		'nombre',
		'activo'
	];

	public function denuncia()
	{
		return $this->hasMany(Denuncium::class, 'id_municipio');
	}
}
