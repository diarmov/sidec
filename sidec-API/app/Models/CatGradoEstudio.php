<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatGradoEstudio
 * 
 * @property int $id_grado_educacion
 * @property string $grado
 * @property int $activa
 * 
 * @property Collection|Denuncium[] $denuncia
 *
 * @package App\Models
 */
class CatGradoEstudio extends Model
{
	protected $table = 'cat_grado_estudios';
	protected $primaryKey = 'id_grado_educacion';
	public $timestamps = false;

	protected $casts = [
		'activa' => 'int'
	];

	protected $fillable = [
		'grado',
		'activa'
	];

	public function denuncia()
	{
		return $this->hasMany(Denuncium::class, 'grado_estudios_denunciante');
	}
}
