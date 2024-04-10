<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EchangeCompetence
 * 
 * @property int $IDUTILISATEUR
 * @property int $IDSERVICE
 * @property string $COMPETENCE
 * 
 * @property Service $service
 *
 * @package App\Models
 */
class EchangeCompetence extends Model
{
	protected $table = 'echange_competences';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDUTILISATEUR' => 'int',
		'IDSERVICE' => 'int'
	];

	protected $fillable = [
		'COMPETENCE'
	];

	public function service()
	{
		return $this->belongsTo(Service::class, 'IDUTILISATEUR', 'IDUTILISATEUR')
					->where('service.IDUTILISATEUR', '=', 'echange_competences.IDUTILISATEUR')
					->where('service.IDSERVICE', '=', 'echange_competences.IDSERVICE');
	}
}
