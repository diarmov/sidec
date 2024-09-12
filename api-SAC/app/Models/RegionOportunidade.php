<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RegionOportunidade
 * 
 * @property int $id_region_oportunidades
 * @property int $cve_edo
 * @property int $cve_num
 * @property int $idMunicipio
 * @property int $sede
 *
 * @package App\Models
 */
class RegionOportunidade extends Model
{
	protected $table = 'region_oportunidades';
	protected $primaryKey = 'id_region_oportunidades';
	public $timestamps = false;

	protected $casts = [
		'cve_edo' => 'int',
		'cve_num' => 'int',
		'idMunicipio' => 'int',
		'sede' => 'int'
	];

	protected $fillable = [
		'cve_edo',
		'cve_num',
		'idMunicipio',
		'sede'
	];
}
