<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Asunto
 * 
 * @property int $idAsunto
 * @property string $folio
 * @property Carbon $fechaRecepcion
 * @property Carbon $fechaCaptacion
 * @property string $funcionario
 * @property string $descripcion
 * @property int $idCasuntos
 * @property int $idUsuario
 * @property int $idDependencia
 * @property string $puestoFuncionario
 * @property int $estatus
 * @property int $captacion
 * @property int $idPrograma
 * @property string $conforme
 * @property string $testigos
 * @property string $documentos
 * @property int $idAtendio
 * @property int $idReviso
 * @property int $id_motivo
 * @property string $clave
 * @property string $programalibre
 * @property int $miembroCS
 * @property string $dependencialibre
 * @property string $domicilionotificacion
 * @property int $idClasificacion
 * @property string $observaciones
 * @property bool $baja
 * @property string $folioSidec
 *
 * @package App\Models
 */
class Asunto extends Model
{
	protected $table = 'asunto';
	protected $primaryKey = 'idAsunto';
	public $timestamps = false;

	protected $casts = [
		'idCasuntos' => 'int',
		'idUsuario' => 'int',
		'idDependencia' => 'int',
		'estatus' => 'int',
		'captacion' => 'int',
		'idPrograma' => 'int',
		'idAtendio' => 'int',
		'idReviso' => 'int',
		'id_motivo' => 'int',
		'miembroCS' => 'int',
		'idClasificacion' => 'int',
		'baja' => 'bool'
	];

	protected $dates = [
		'fechaRecepcion',
		'fechaCaptacion'
	];

	protected $fillable = [
		'folio',
		'fechaRecepcion',
		'fechaCaptacion',
		'funcionario',
		'descripcion',
		'idCasuntos',
		'idUsuario',
		'idDependencia',
		'puestoFuncionario',
		'estatus',
		'captacion',
		'idPrograma',
		'conforme',
		'testigos',
		'documentos',
		'idAtendio',
		'idReviso',
		'id_motivo',
		'clave',
		'programalibre',
		'miembroCS',
		'dependencialibre',
		'domicilionotificacion',
		'idClasificacion',
		'observaciones',
		'baja',
		'folioSidec',
		'descripcion_archivos'
	];

	public function getRouteKeyname()
	{
		return 'folioSidec';
	}
}
