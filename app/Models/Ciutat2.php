<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ciutat
 * 
 * @property int $id
 * @property string $nom
 * @property int $n_habitants
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Casal[] $casals
 *
 * @package App\Models
 */
class Ciutat extends Model
{
	protected $table = 'ciutats';

	protected $casts = [
		'n_habitants' => 'int'
	];

	protected $hidden = [
		'remember_token'
	];

	protected $fillable = [
		'nom',
		'n_habitants',
		'remember_token'
	];

	public function casals()
	{
		return $this->hasMany(Casal::class, 'id_ciutat');
	}
}
