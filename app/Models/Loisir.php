<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Loisir
 * 
 * @property int $IDUTILISATEUR
 * @property int $IDSERVICE
 * @property int $NBPERSONNES
 * @property bool $ESTSPORTIF
 * 
 * @property Service $service
 *
 * @package App\Models
 */
class Loisir extends Model
{
	protected $table = 'loisirs';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDUTILISATEUR' => 'int',
		'IDSERVICE' => 'int',
		'NBPERSONNES' => 'int',
		'ESTSPORTIF' => 'bool'
	];

	protected $fillable = [
		'NBPERSONNES',
		'ESTSPORTIF'
	];

	public function service()
	{
		return $this->belongsTo(Service::class, 'IDUTILISATEUR', 'IDUTILISATEUR')
					->where('service.IDUTILISATEUR', '=', 'loisirs.IDUTILISATEUR')
					->where('service.IDSERVICE', '=', 'loisirs.IDSERVICE');
	}
}
