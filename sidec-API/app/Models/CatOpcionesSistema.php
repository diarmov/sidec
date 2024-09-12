<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatOpcionesSistema
 * 
 * @property int $id
 * @property string $nombre
 * @property int $activo
 * 
 * @property Collection|ClasificacionDenuncium[] $clasificacion_denuncia
 *
 * @package App\Models
 */
class CatOpcionesSistema extends Model
{
	protected $table = 'cat_opciones_sistemas';
	public $timestamps = false;

	protected $casts = [
		'activo' => 'int'
	];

	protected $fillable = [
		'nombre',
		'activo'
	];

	public function clasificacion_denuncia()
	{
		return $this->hasMany(ClasificacionDenuncium::class, 'clasificacion');
	}
}
