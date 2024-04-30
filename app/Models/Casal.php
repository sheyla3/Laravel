<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casal extends Model
{
    use HasFactory;
    
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
