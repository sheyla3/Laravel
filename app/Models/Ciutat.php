<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciutat extends Model
{
    use HasFactory;
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
