<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatEstatus
 * 
 * @property int $id
 * @property string $estatus
 * @property int $activo
 * 
 * @property Collection|Denuncium[] $denuncia
 *
 * @package App\Models
 */
class CatEstatus extends Model
{
	protected $table = 'cat_estatus';
	public $timestamps = false;

	protected $casts = [
		'activo' => 'int'
	];

	protected $fillable = [
		'estatus',
		'activo'
	];

	public function denuncia()
	{
		return $this->hasMany(Denuncium::class, 'estatus');
	}
}
