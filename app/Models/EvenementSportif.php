<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EvenementSportif
 * 
 * @property int $IDUTILISATEUR
 * @property int $IDSERVICE
 * @property int $NBPERSONNES
 * 
 * @property Service $service
 *
 * @package App\Models
 */
class EvenementSportif extends Model
{
	protected $table = 'evenement_sportif';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDUTILISATEUR' => 'int',
		'IDSERVICE' => 'int',
		'NBPERSONNES' => 'int'
	];

	protected $fillable = [
		'NBPERSONNES'
	];

	public function service()
	{
		return $this->belongsTo(Service::class, 'IDUTILISATEUR', 'IDUTILISATEUR')
					->where('service.IDUTILISATEUR', '=', 'evenement_sportif.IDUTILISATEUR')
					->where('service.IDSERVICE', '=', 'evenement_sportif.IDSERVICE');
	}
}
