<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Session;

class AdminController extends Controller
{
	
	public function index()
	{
		return view('admin.index');
	}






}