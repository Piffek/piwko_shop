<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
	protected $fillable = [
			'id','produkt','wymiary', 'cena', 'rodzaj', 'przeznaczenie','wymiary_ogolne','ilosc','opis','promocja','procent_promocji' ,'tekst_promocji','zakupienia','id_adress_delivery'
	];
	
	protected $hidden = [
			'remember_token',
	];
	
	protected $table = 'Items';

}
