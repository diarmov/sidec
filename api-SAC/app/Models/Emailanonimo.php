<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Emailanonimo
 * 
 * @property int $id_anonimo
 * @property int $idAsunto
 * @property string $email
 *
 * @package App\Models
 */
class Emailanonimo extends Model
{
	protected $table = 'emailanonimo';
	protected $primaryKey = 'id_anonimo';
	public $timestamps = false;

	protected $casts = [
		'idAsunto' => 'int'
	];

	protected $fillable = [
		'idAsunto',
		'email'
	];
}
