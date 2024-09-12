<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MedidaAplicada
 * 
 * @property int $id_medida_aplicada
 * @property string $medida
 *
 * @package App\Models
 */
class MedidaAplicada extends Model
{
	protected $table = 'medida_aplicada';
	protected $primaryKey = 'id_medida_aplicada';
	public $timestamps = false;

	protected $fillable = [
		'medida'
	];
}
