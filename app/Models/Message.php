<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * 
 * @property int $IDMESSAGE
 * @property int|null $IDSERVICE
 * @property int|null $IDTICKET
 * @property int $IDUTILISATEUR
 * @property int $IDUTILISATEUR_1
 * @property int|null $IDUTILISATEUR_2
 * @property int|null $IDTICKET_1
 * @property string $CONTENU
 * @property Carbon $DATEMSG
 * 
 * @property Etudiant $etudiant
 * @property Service|null $service
 * @property Signalement $signalement
 * @property Ticket|null $ticket
 *
 * @package App\Models
 */
class Message extends Model
{
	protected $table = 'message';
	protected $primaryKey = 'IDMESSAGE';
	public $timestamps = false;

	protected $casts = [
		'IDSERVICE' => 'int',
		'IDTICKET' => 'int',
		'IDUTILISATEUR' => 'int',
		'IDUTILISATEUR_1' => 'int',
		'IDUTILISATEUR_2' => 'int',
		'IDTICKET_1' => 'int',
		'DATEMSG' => 'datetime'
	];

	protected $fillable = [
		'IDSERVICE',
		'IDTICKET',
		'IDUTILISATEUR',
		'IDUTILISATEUR_1',
		'IDUTILISATEUR_2',
		'IDTICKET_1',
		'CONTENU',
		'DATEMSG'
	];

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'IDUTILISATEUR_1');
	}

	public function service()
	{
		return $this->belongsTo(Service::class, 'IDUTILISATEUR_2', 'IDUTILISATEUR')
					->where('service.IDUTILISATEUR', '=', 'message.IDUTILISATEUR_2')
					->where('service.IDSERVICE', '=', 'message.IDSERVICE');
	}

	public function signalement()
	{
		return $this->hasOne(Signalement::class, 'IDMESSAGE');
	}

	public function ticket()
	{
		return $this->belongsTo(Ticket::class, 'IDTICKET');
	}
}
