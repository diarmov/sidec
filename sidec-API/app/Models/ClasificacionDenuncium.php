<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClasificacionDenuncium
 * 
 * @property int $id_clasificacion_denuncia
 * @property int $id_denuncia
 * @property int $clasificacion
 * @property int $id_usuario
 * @property string $justificacion
 * @property Carbon $fecha_clasificacion
 * 
 * @property CatOpcionesSistema $cat_opciones_sistema
 * @property Denuncium $denuncium
 * @property Usuario $usuario
 * @property Collection|Bitacora[] $bitacoras
 *
 * @package App\Models
 */
class ClasificacionDenuncium extends Model
{
	protected $table = 'clasificacion_denuncia';
	protected $primaryKey = 'id_clasificacion_denuncia';
	public $timestamps = false;

	protected $casts = [
		'id_denuncia' => 'int',
		'clasificacion' => 'int',
		'id_usuario' => 'int'
	];

	protected $dates = [
		'fecha_clasificacion'
	];

	protected $fillable = [
		'id_denuncia',
		'clasificacion',
		'id_usuario',
		'justificacion',
		'fecha_clasificacion'
	];

	public function cat_opciones_sistema()
	{
		return $this->belongsTo(CatOpcionesSistema::class, 'clasificacion');
	}

	public function denuncium()
	{
		return $this->belongsTo(Denuncium::class, 'id_denuncia');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function bitacoras()
	{
		return $this->hasMany(Bitacora::class, 'id_clasificacion');
	}
}
