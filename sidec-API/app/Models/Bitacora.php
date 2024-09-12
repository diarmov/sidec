<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bitacora
 * 
 * @property int $id_bitacora
 * @property string $folio_denuncia
 * @property int $id_clasificacion
 * @property int $sistema_destino
 * @property int $estatus_denuncia
 * @property int $id_usuario
 * @property Carbon $fechaRegistro
 * 
 * @property ClasificacionDenuncium $clasificacion_denuncium
 * @property Denuncium $denuncium
 *
 * @package App\Models
 */
class Bitacora extends Model
{
	protected $table = 'bitacora';
	protected $primaryKey = 'id_bitacora';
	public $timestamps = false;

	protected $casts = [
		'id_clasificacion' => 'int',
		'sistema_destino' => 'int',
		'estatus_denuncia' => 'int',
		'id_usuario' => 'int'
	];

	protected $dates = [
		'fechaRegistro'
	];

	protected $fillable = [
		'folio_denuncia',
		'id_clasificacion',
		'sistema_destino',
		'estatus_denuncia',
		'id_usuario',
		'fechaRegistro'
	];

	public function clasificacion_denuncium()
	{
		return $this->belongsTo(ClasificacionDenuncium::class, 'id_clasificacion');
	}

	public function denuncium()
	{
		return $this->belongsTo(Denuncium::class, 'folio_denuncia', 'folio');
	}

	public function getRouteKeyname()
	{
		return 'folio_denuncia';
	}
}
