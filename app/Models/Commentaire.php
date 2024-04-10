<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Commentaire
 * 
 * @property int $IDCOMMENTAIRE
 * @property int $IDSERVICE
 * @property int $IDUTILISATEUR
 * @property int $IDUTILISATEUR_1
 * @property string $CONTENU
 * @property Carbon $DATECOM
 * 
 * @property Etudiant $etudiant
 * @property Service $service
 *
 * @package App\Models
 */
class Commentaire extends Model
{
	protected $table = 'commentaire';
	protected $primaryKey = 'IDCOMMENTAIRE';
	public $timestamps = false;

	protected $casts = [
		'IDSERVICE' => 'int',
		'IDUTILISATEUR' => 'int',
		'IDUTILISATEUR_1' => 'int',
		'DATECOM' => 'datetime'
	];

	protected $fillable = [
		'IDSERVICE',
		'IDUTILISATEUR',
		'IDUTILISATEUR_1',
		'CONTENU',
		'DATECOM'
	];

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'IDUTILISATEUR_1');
	}

	public function service()
	{
		return $this->belongsTo(Service::class, 'IDUTILISATEUR', 'IDUTILISATEUR')
					->where('service.IDUTILISATEUR', '=', 'commentaire.IDUTILISATEUR')
					->where('service.IDSERVICE', '=', 'commentaire.IDSERVICE');
	}
}
