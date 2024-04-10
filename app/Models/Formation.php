<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Formation
 * 
 * @property int $IDFORMATION
 * @property string $LIBELLE
 * 
 * @property Collection|Classe[] $classes
 *
 * @package App\Models
 */
class Formation extends Model
{
	protected $table = 'formation';
	protected $primaryKey = 'IDFORMATION';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLE'
	];

	public function classes()
	{
		return $this->hasMany(Classe::class, 'IDFORMATION');
	}
}
