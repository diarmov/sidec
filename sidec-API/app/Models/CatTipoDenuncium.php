<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CatTipoDenuncium
 * 
 * @property int $id_cat_tipo_denuncia
 * @property string $tipo_denuncia
 * @property int $categoria
 * @property int $activo
 * 
 * @property Collection|Denuncium[] $denuncia
 *
 * @package App\Models
 */
class CatTipoDenuncium extends Model
{
	protected $table = 'cat_tipo_denuncia';
	protected $primaryKey = 'id_cat_tipo_denuncia';
	public $timestamps = false;

	protected $casts = [
		'categoria' => 'int',
		'activo' => 'int'
	];

	protected $fillable = [
		'tipo_denuncia',
		'categoria',
		'activo'
	];

	public function denuncia()
	{
		return $this->hasMany(Denuncium::class, 'tipo_denuncia');
	}
}
