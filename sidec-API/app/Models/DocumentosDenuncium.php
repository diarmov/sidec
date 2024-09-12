<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DocumentosDenuncium
 * 
 * @property int $id_documento
 * @property int $id_denuncia
 * @property string $ruta
 * 
 * @property Denuncium $denuncium
 *
 * @package App\Models
 */
class DocumentosDenuncium extends Model
{
	protected $table = 'documentos_denuncia';
	protected $primaryKey = 'id_documento';
	public $timestamps = false;

	protected $casts = [
		'id_denuncia' => 'int'
	];

	protected $fillable = [
		'id_denuncia',
		'ruta'
	];

	public function denuncium()
	{
		return $this->belongsTo(Denuncium::class, 'id_denuncia');
	}
}
