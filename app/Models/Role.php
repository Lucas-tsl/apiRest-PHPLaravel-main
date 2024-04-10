<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $IDROLE
 * @property string $LIBELLE
 * 
 * @property Collection|Administrateur[] $administrateurs
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'role';
	protected $primaryKey = 'IDROLE';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLE'
	];

	public function administrateurs()
	{
		return $this->hasMany(Administrateur::class, 'IDROLE');
	}
}
