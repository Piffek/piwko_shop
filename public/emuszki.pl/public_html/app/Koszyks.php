<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Koszyks extends Model
{
	protected $fillable = [
			'id_produktu', 'cena', 'ilosc', 'id_user'
	];
	
	protected $hidden = [
			'remember_token',
	];
	
	protected $table = 'koszyks';
}
