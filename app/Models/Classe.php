<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Classe
 * 
 * @property int $IDCLASSE
 * @property int $IDFORMATION
 * @property string $LIBELLE
 * @property int $NIVEAU
 * 
 * @property Formation $formation
 * @property Collection|Etudiant[] $etudiants
 *
 * @package App\Models
 */
class Classe extends Model
{
	protected $table = 'classe';
	protected $primaryKey = 'IDCLASSE';
	public $timestamps = false;

	protected $casts = [
		'IDFORMATION' => 'int',
		'NIVEAU' => 'int'
	];

	protected $fillable = [
		'IDFORMATION',
		'LIBELLE',
		'NIVEAU'
	];

	public function formation()
	{
		return $this->belongsTo(Formation::class, 'IDFORMATION');
	}

	public function etudiants()
	{
		return $this->hasMany(Etudiant::class, 'IDCLASSE');
	}
}
