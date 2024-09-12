<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatMotivo
 * 
 * @property int $id_motivo
 * @property string $nombre
 *
 * @package App\Models
 */
class CatMotivo extends Model
{
	protected $table = 'cat_motivos';
	protected $primaryKey = 'id_motivo';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];
}
