<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
	protected $fillable = [
			'id', 'what','when', 'id_user', 'created_at', 'updated_at'
	];
	
	protected $table = 'todolist';
}
