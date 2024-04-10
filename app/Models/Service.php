<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * 
 * @property int $IDUTILISATEUR
 * @property int $IDSERVICE
 * @property string $TYPE
 * @property string $LIBELLE
 * @property string $DESCRIPTION
 * @property string|null $NUMERO
 * @property string|null $RUE
 * @property string $CODEPOSTAL
 * @property string $VILLE
 * @property Carbon $DATEPOSTER
 * @property bool $ESTDEMANDE
 * @property int $COUT
 * @property int $ETAT
 * 
 * @property Etudiant $etudiant
 * @property Cinema $cinema
 * @property Collection|Commentaire[] $commentaires
 * @property Covoiturage $covoiturage
 * @property EchangeCompetence $echange_competence
 * @property EvenementSportif $evenement_sportif
 * @property Lecture $lecture
 * @property Loisir $loisir
 * @property Collection|Message[] $messages
 * @property Collection|Offre[] $offres
 * @property Collection|Signalement[] $signalements
 *
 * @package App\Models
 */
class Service extends Model
{
	protected $table = 'service';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDUTILISATEUR' => 'int',
		'IDSERVICE' => 'int',
		'DATEPOSTER' => 'datetime',
		'ESTDEMANDE' => 'bool',
		'COUT' => 'int',
		'ETAT' => 'int'
	];

	protected $fillable = [
		'TYPE',
		'LIBELLE',
		'DESCRIPTION',
		'NUMERO',
		'RUE',
		'CODEPOSTAL',
		'VILLE',
		'DATEPOSTER',
		'ESTDEMANDE',
		'COUT',
		'ETAT'
	];

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'IDUTILISATEUR');
	}

	public function cinema()
	{
		return $this->hasOne(Cinema::class, 'IDUTILISATEUR', 'IDUTILISATEUR');
	}

	public function commentaires()
	{
		return $this->hasMany(Commentaire::class, 'IDUTILISATEUR', 'IDUTILISATEUR');
	}

	public function covoiturage()
	{
		return $this->hasOne(Covoiturage::class, 'IDUTILISATEUR', 'IDUTILISATEUR');
	}

	public function echange_competence()
	{
		return $this->hasOne(EchangeCompetence::class, 'IDUTILISATEUR', 'IDUTILISATEUR');
	}

	public function evenement_sportif()
	{
		return $this->hasOne(EvenementSportif::class, 'IDUTILISATEUR', 'IDUTILISATEUR');
	}

	public function lecture()
	{
		return $this->hasOne(Lecture::class, 'IDUTILISATEUR', 'IDUTILISATEUR');
	}

	public function loisir()
	{
		return $this->hasOne(Loisir::class, 'IDUTILISATEUR', 'IDUTILISATEUR');
	}

	public function messages()
	{
		return $this->hasMany(Message::class, 'IDUTILISATEUR_2', 'IDUTILISATEUR');
	}

	public function offres()
	{
		return $this->hasMany(Offre::class, 'IDUTILISATEUR_1', 'IDUTILISATEUR');
	}

	public function signalements()
	{
		return $this->hasMany(Signalement::class, 'IDUTILISATEUR', 'IDUTILISATEUR');
	}
}
