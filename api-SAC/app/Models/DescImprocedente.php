<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DescImprocedente
 * 
 * @property int $id_desc_improcedente
 * @property int $idAsunto
 * @property string $descripcion_imp
 *
 * @package App\Models
 */
class DescImprocedente extends Model
{
	protected $table = 'desc_improcedente';
	protected $primaryKey = 'id_desc_improcedente';
	public $timestamps = false;

	protected $casts = [
		'idAsunto' => 'int'
	];

	protected $fillable = [
		'idAsunto',
		'descripcion_imp'
	];
}
