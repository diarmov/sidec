<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatSexo
 * 
 * @property int $id_sexo
 * @property string $sexo
 * @property int $activo
 * 
 * @property Collection|Denuncium[] $denuncia
 *
 * @package App\Models
 */
class CatSexo extends Model
{
	protected $table = 'cat_sexo';
	protected $primaryKey = 'id_sexo';
	public $timestamps = false;

	protected $casts = [
		'activo' => 'int'
	];

	protected $fillable = [
		'sexo',
		'activo'
	];

	public function denuncia()
	{
		return $this->hasMany(Denuncium::class, 'id_sexo');
	}
}
