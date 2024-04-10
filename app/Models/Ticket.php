<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 * 
 * @property int $IDTICKET
 * @property int $IDUTILISATEUR
 * @property string $TITRE
 * @property string $DESCRIPTION
 * @property Carbon $DATECREATION
 * @property int $ETAT
 * 
 * @property Etudiant $etudiant
 * @property Collection|Message[] $messages
 * @property Signalement $signalement
 *
 * @package App\Models
 */
class Ticket extends Model
{
	protected $table = 'ticket';
	protected $primaryKey = 'IDTICKET';
	public $timestamps = false;

	protected $casts = [
		'IDUTILISATEUR' => 'int',
		'DATECREATION' => 'datetime',
		'ETAT' => 'int'
	];

	protected $fillable = [
		'IDUTILISATEUR',
		'TITRE',
		'DESCRIPTION',
		'DATECREATION',
		'ETAT'
	];

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'IDUTILISATEUR');
	}

	public function messages()
	{
		return $this->hasMany(Message::class, 'IDTICKET');
	}

	public function signalement()
	{
		return $this->hasOne(Signalement::class, 'IDTICKET');
	}
}
