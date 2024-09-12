<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Denuncium
 * 
 * @property int $id_denuncia
 * @property string $folio
 * @property int $tipo_denuncia
 * @property Carbon $fechaRecepcion
 * @property string $nombre_funcionario
 * @property string $pa_funcionario
 * @property string $sa_funcionario
 * @property string $puesto_funcionario
 * @property int $rel_prog_des_soc
 * @property string $programalibre
 * @property int $miembro_contraloria_social
 * @property string $dependencialibre
 * @property string $narracion_hechos
 * @property int $doctos_fisicos
 * @property int $doctos_electronicos
 * @property int $testigos
 * @property string $otro_tipo_prueba
 * @property string $domicilio_notificaciones
 * @property int $datos_personales
 * @property string $nombre_denunciante
 * @property int $id_estado
 * @property int $id_municipio
 * @property string $localidad
 * @property string $telefono_denunciante
 * @property string $email_denunciante
 * @property int $grado_estudios_denunciante
 * @property string $ocupacion
 * @property int $id_sexo
 * @property int $edad
 * @property int $estatus
 * @property string $nombre_comite
 * @property string $pa_denunciante
 * @property string $sa_denunciante
 * @property string $curp_denunciante
 * @property string $rfc_denunciante
 * @property string $colonia_denunciante
 * @property string $calle_denunciante
 * @property string $num_ext_denunciante
 * @property string $num_int_denunciante
 * @property string $cp_denunciante
 * @property string $descripcion_archivos
 * @property Carbon $fecha_hechos
 * @property Carbon $hora_hechos
 * @property int $id_buzon
 * @property string $justificacion_rechazo
 * 
 * @property CatSexo $cat_sexo
 * @property CatTipoDenuncium $cat_tipo_denuncium
 * @property CatEstado $cat_estado
 * @property CatEstatus $cat_estatus
 * @property CatGradoEstudio $cat_grado_estudio
 * @property CatMunicipio $cat_municipio
 * @property Collection|Bitacora[] $bitacoras
 * @property Collection|ClasificacionDenuncium[] $clasificacion_denuncia
 * @property Collection|DocumentosDenuncium[] $documentos_denuncia
 *
 * @package App\Models
 */
class Denuncium extends Model
{
	protected $table = 'denuncia';
	protected $primaryKey = 'id_denuncia';
	public $timestamps = false;

	protected $casts = [
		'tipo_denuncia' => 'int',
		'rel_prog_des_soc' => 'int',
		'miembro_contraloria_social' => 'int',
		'doctos_fisicos' => 'int',
		'doctos_electronicos' => 'int',
		'testigos' => 'int',
		'datos_personales' => 'int',
		'id_estado' => 'int',
		'id_municipio' => 'int',
		'grado_estudios_denunciante' => 'int',
		'id_sexo' => 'int',
		'edad' => 'int',
		'estatus' => 'int',
		'id_buzon' => 'int'
	];

	protected $dates = [
		'fechaRecepcion',
		'fecha_hechos',
		'hora_hechos'
	];

	protected $fillable = [
		'folio',
		'tipo_denuncia',
		'fechaRecepcion',
		'nombre_funcionario',
		'pa_funcionario',
		'sa_funcionario',
		'puesto_funcionario',
		'rel_prog_des_soc',
		'programalibre',
		'miembro_contraloria_social',
		'dependencialibre',
		'narracion_hechos',
		'doctos_fisicos',
		'doctos_electronicos',
		'testigos',
		'otro_tipo_prueba',
		'domicilio_notificaciones',
		'datos_personales',
		'nombre_denunciante',
		'id_estado',
		'id_municipio',
		'localidad',
		'telefono_denunciante',
		'email_denunciante',
		'grado_estudios_denunciante',
		'ocupacion',
		'id_sexo',
		'edad',
		'estatus',
		'nombre_comite',
		'pa_denunciante',
		'sa_denunciante',
		'curp_denunciante',
		'rfc_denunciante',
		'colonia_denunciante',
		'calle_denunciante',
		'num_ext_denunciante',
		'num_int_denunciante',
		'cp_denunciante',
		'descripcion_archivos',
		'fecha_hechos',
		'hora_hechos',
		'id_buzon',
		'justificacion_rechazo',
		'motivo_improcedente',
	];

	public function cat_sexo()
	{
		return $this->belongsTo(CatSexo::class, 'id_sexo');
	}

	public function cat_tipo_denuncium()
	{
		return $this->belongsTo(CatTipoDenuncium::class, 'tipo_denuncia');
	}

	public function cat_estado()
	{
		return $this->belongsTo(CatEstado::class, 'id_estado');
	}

	public function cat_estatus()
	{
		return $this->belongsTo(CatEstatus::class, 'estatus');
	}

	public function cat_grado_estudio()
	{
		return $this->belongsTo(CatGradoEstudio::class, 'grado_estudios_denunciante');
	}

	public function cat_municipio()
	{
		return $this->belongsTo(CatMunicipio::class, 'id_municipio');
	}

	public function bitacoras()
	{
		return $this->hasMany(Bitacora::class, 'folio_denuncia', 'folio');
	}

	public function clasificacion_denuncia()
	{
		return $this->hasMany(ClasificacionDenuncium::class, 'id_denuncia');
	}

	public function documentos_denuncia()
	{
		return $this->hasMany(DocumentosDenuncium::class, 'id_denuncia');
	}
}
