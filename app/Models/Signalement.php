<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Signalement
 * 
 * @property int $IDTICKET
 * @property int|null $IDSERVICE
 * @property int|null $IDMESSAGE
 * @property int|null $IDUTILISATEUR
 * @property string $TITRE
 * @property string $DESCRIPTION
 * @property Carbon $DATECREATION
 * @property int $ETAT
 * 
 * @property Message $message
 * @property Service|null $service
 * @property Ticket $ticket
 *
 * @package App\Models
 */
class Signalement extends Model
{
	protected $table = 'signalement';
	protected $primaryKey = 'IDTICKET';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDTICKET' => 'int',
		'IDSERVICE' => 'int',
		'IDMESSAGE' => 'int',
		'IDUTILISATEUR' => 'int',
		'DATECREATION' => 'datetime',
		'ETAT' => 'int'
	];

	protected $fillable = [
		'IDSERVICE',
		'IDMESSAGE',
		'IDUTILISATEUR',
		'TITRE',
		'DESCRIPTION',
		'DATECREATION',
		'ETAT'
	];

	public function message()
	{
		return $this->hasOne(Message::class, 'IDTICKET_1');
	}

	public function service()
	{
		return $this->belongsTo(Service::class, 'IDUTILISATEUR', 'IDUTILISATEUR')
					->where('service.IDUTILISATEUR', '=', 'signalement.IDUTILISATEUR')
					->where('service.IDSERVICE', '=', 'signalement.IDSERVICE');
	}

	public function ticket()
	{
		return $this->belongsTo(Ticket::class, 'IDTICKET');
	}
}
