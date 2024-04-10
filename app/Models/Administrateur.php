<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Administrateur
 * 
 * @property int $IDUTILISATEUR
 * @property int $IDROLE
 * @property string $NOM
 * @property string $PRENOM
 * @property Carbon $DATENAISS
 * @property string $EMAIL
 * @property string $PASSWORD
 * @property string|null $JETON_VALIDATION
 * @property int $ETAT_COMPTE
 * 
 * @property Role $role
 *
 * @package App\Models
 */
class Administrateur extends Model
{
	protected $table = 'administrateur';
	protected $primaryKey = 'IDUTILISATEUR';
	public $timestamps = false;

	protected $casts = [
		'IDROLE' => 'int',
		'DATENAISS' => 'datetime',
		'ETAT_COMPTE' => 'int'
	];

	protected $fillable = [
		'IDROLE',
		'NOM',
		'PRENOM',
		'DATENAISS',
		'EMAIL',
		'PASSWORD',
		'JETON_VALIDATION',
		'ETAT_COMPTE'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'IDROLE');
	}
}
