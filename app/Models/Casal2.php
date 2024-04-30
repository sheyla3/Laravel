<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Casal
 * 
 * @property int $id
 * @property string $nom
 * @property Carbon $data_inici
 * @property Carbon $data_final
 * @property int $n_places
 * @property int $id_ciutat
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Ciutat $ciutat
 *
 * @package App\Models
 */
class Casal extends Model
{
	protected $table = 'casals';

	protected $casts = [
		'data_inici' => 'datetime',
		'data_final' => 'datetime',
		'n_places' => 'int',
		'id_ciutat' => 'int'
	];

	protected $hidden = [
		'remember_token'
	];

	protected $fillable = [
		'nom',
		'data_inici',
		'data_final',
		'n_places',
		'id_ciutat',
		'remember_token'
	];

	public function ciutat()
	{
		return $this->belongsTo(Ciutat::class, 'id_ciutat');
	}
}
