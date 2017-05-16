<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kinds extends Model
{
	protected $fillable = [
	    'id','name'
	];
	protected $table = 'kinds';
}
