<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'nick',
		'password',
		'remember_token'
	];

	public static function loginUsuario($nick)
	{
		return self::where('nick', $nick)->first();
	}
}
