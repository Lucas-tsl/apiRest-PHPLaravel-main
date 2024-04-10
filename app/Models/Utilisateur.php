<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Utilisateur
 * 
 * @property int $IDUTILISATEUR
 * @property string $NOM
 * @property string $PRENOM
 * @property Carbon $DATENAISS
 * @property string $EMAIL
 * @property string $PASSWORD
 * @property string|null $JETON_VALIDATION
 * @property int $ETAT_COMPTE
 * 
 * @property Administrateur $administrateur
 * @property Etudiant $etudiant
 *
 * @package App\Models
 */
class Utilisateur extends Model
{
	protected $table = 'utilisateur';
	protected $primaryKey = 'IDUTILISATEUR';
	public $timestamps = false;

	protected $casts = [
		'DATENAISS' => 'datetime',
		'ETAT_COMPTE' => 'int'
	];

	protected $fillable = [
		'NOM',
		'PRENOM',
		'DATENAISS',
		'EMAIL',
		'PASSWORD',
		'JETON_VALIDATION',
		'ETAT_COMPTE'
	];

	public function administrateur()
	{
		return $this->hasOne(Administrateur::class, 'IDUTILISATEUR');
	}

	public function etudiant()
	{
		return $this->hasOne(Etudiant::class, 'IDUTILISATEUR');
	}
}
