<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cinema
 * 
 * @property int $IDUTILISATEUR
 * @property int $IDSERVICE
 * @property float|null $PRIXSUPP
 * @property int|null $NBPLACES
 * 
 * @property Service $service
 *
 * @package App\Models
 */
class Cinema extends Model
{
	protected $table = 'cinema';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDUTILISATEUR' => 'int',
		'IDSERVICE' => 'int',
		'PRIXSUPP' => 'float',
		'NBPLACES' => 'int'
	];

	protected $fillable = [
		'PRIXSUPP',
		'NBPLACES'
	];

	public function service()
	{
		return $this->belongsTo(Service::class, 'IDUTILISATEUR', 'IDUTILISATEUR')
					->where('service.IDUTILISATEUR', '=', 'cinema.IDUTILISATEUR')
					->where('service.IDSERVICE', '=', 'cinema.IDSERVICE');
	}
}
