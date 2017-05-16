<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolesHasUsers extends Model
{
	protected $fillable = [
	    'users_id', 'roles_id',
	];
}
