<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lecture
 * 
 * @property int $IDUTILISATEUR
 * @property int $IDSERVICE
 * @property string|null $GENRELITTERAIRE
 * @property string|null $AUTEURLITTERAIRE
 * @property string|null $TITRELITTERAIRE
 * 
 * @property Service $service
 *
 * @package App\Models
 */
class Lecture extends Model
{
	protected $table = 'lecture';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDUTILISATEUR' => 'int',
		'IDSERVICE' => 'int'
	];

	protected $fillable = [
		'GENRELITTERAIRE',
		'AUTEURLITTERAIRE',
		'TITRELITTERAIRE'
	];

	public function service()
	{
		return $this->belongsTo(Service::class, 'IDUTILISATEUR', 'IDUTILISATEUR')
					->where('service.IDUTILISATEUR', '=', 'lecture.IDUTILISATEUR')
					->where('service.IDSERVICE', '=', 'lecture.IDSERVICE');
	}
}
