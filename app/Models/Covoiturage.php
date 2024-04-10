<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Covoiturage
 * 
 * @property int $IDUTILISATEUR
 * @property int $IDSERVICE
 * @property string|null $NUMEROARRIVEE
 * @property string|null $RUEARRIVEE
 * @property string $CODEPOSTALARRIVEE
 * @property string $VILLEARRIVEE
 * @property Carbon $DATEDEPART
 * @property bool $VOITUREPERSONNEL
 * @property int $NBPLACES
 * 
 * @property Service $service
 *
 * @package App\Models
 */
class Covoiturage extends Model
{
	protected $table = 'covoiturage';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDUTILISATEUR' => 'int',
		'IDSERVICE' => 'int',
		'DATEDEPART' => 'datetime',
		'VOITUREPERSONNEL' => 'bool',
		'NBPLACES' => 'int'
	];

	protected $fillable = [
		'NUMEROARRIVEE',
		'RUEARRIVEE',
		'CODEPOSTALARRIVEE',
		'VILLEARRIVEE',
		'DATEDEPART',
		'VOITUREPERSONNEL',
		'NBPLACES'
	];

	public function service()
	{
		return $this->belongsTo(Service::class, 'IDUTILISATEUR', 'IDUTILISATEUR')
					->where('service.IDUTILISATEUR', '=', 'covoiturage.IDUTILISATEUR')
					->where('service.IDSERVICE', '=', 'covoiturage.IDSERVICE');
	}
}
