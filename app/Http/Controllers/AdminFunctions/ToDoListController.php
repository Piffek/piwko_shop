<?php

namespace App\Http\Controllers\AdminFunctions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ToDoList;


class ToDoListController extends Controller
{  
    public function addToDoList(Request $request){
		ToDoList::create($request->all());
    }
}
