<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Offre
 * 
 * @property int $IDUTILISATEUR
 * @property int $IDUTILISATEUR_1
 * @property int $IDSERVICE
 * @property int|null $PRIX
 * 
 * @property Etudiant $etudiant
 * @property Service $service
 *
 * @package App\Models
 */
class Offre extends Model
{
	protected $table = 'offre';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDUTILISATEUR' => 'int',
		'IDUTILISATEUR_1' => 'int',
		'IDSERVICE' => 'int',
		'PRIX' => 'int'
	];

	protected $fillable = [
		'PRIX'
	];

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'IDUTILISATEUR');
	}

	public function service()
	{
		return $this->belongsTo(Service::class, 'IDUTILISATEUR_1', 'IDUTILISATEUR')
					->where('service.IDUTILISATEUR', '=', 'offre.IDUTILISATEUR_1')
					->where('service.IDSERVICE', '=', 'offre.IDSERVICE');
	}
}
