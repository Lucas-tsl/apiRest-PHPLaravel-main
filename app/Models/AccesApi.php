<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AccesApi
 * 
 * @property int $IDKEY
 * @property string $CLE_API
 *
 * @package App\Models
 */
class AccesApi extends Model
{
	protected $table = 'acces_api';
	protected $primaryKey = 'IDKEY';
	public $timestamps = false;

	protected $fillable = [
		'CLE_API'
	];
}
