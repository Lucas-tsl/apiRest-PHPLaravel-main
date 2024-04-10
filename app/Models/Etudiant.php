<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Etudiant
 * 
 * @property int $IDUTILISATEUR
 * @property int $IDCLASSE
 * @property bool $EST_MODERATEUR
 * @property string $NOM
 * @property string $PRENOM
 * @property Carbon $DATENAISS
 * @property string $EMAIL
 * @property string $PASSWORD
 * @property int $CREDITS
 * @property int $ETAT_COMPTE
 * 
 * @property Classe $classe
 * @property Collection|Commentaire[] $commentaires
 * @property Collection|Message[] $messages
 * @property Collection|Offre[] $offres
 * @property Collection|Service[] $services
 * @property Collection|Ticket[] $tickets
 *
 * @package App\Models
 */
class Etudiant extends Model
{
	protected $table = 'etudiant';
	protected $primaryKey = 'IDUTILISATEUR';
	public $timestamps = false;

	protected $casts = [
		'IDCLASSE' => 'int',
		'EST_MODERATEUR' => 'bool',
		'DATENAISS' => 'datetime',
		'CREDITS' => 'int',
		'ETAT_COMPTE' => 'int'
	];

	protected $fillable = [
		'IDCLASSE',
		'EST_MODERATEUR',
		'NOM',
		'PRENOM',
		'DATENAISS',
		'EMAIL',
		'PASSWORD',
		'CREDITS',
		'ETAT_COMPTE'
	];

	public function classe()
	{
		return $this->belongsTo(Classe::class, 'IDCLASSE');
	}

	public function commentaires()
	{
		return $this->hasMany(Commentaire::class, 'IDUTILISATEUR_1');
	}

	public function messages()
	{
		return $this->hasMany(Message::class, 'IDUTILISATEUR_1');
	}

	public function offres()
	{
		return $this->hasMany(Offre::class, 'IDUTILISATEUR');
	}

	public function services()
	{
		return $this->hasMany(Service::class, 'IDUTILISATEUR');
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class, 'IDUTILISATEUR');
	}
}
