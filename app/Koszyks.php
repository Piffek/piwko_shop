<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Koszyks extends Model
{
	protected $fillable = [
			'id','id_produktu','product', 'cena', 'ilosc', 'id_user'
	];
	
	protected $hidden = [
			'remember_token',
	];
	
	protected $table = 'koszyks';
}
