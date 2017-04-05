<?php

namespace App\Http\Controllers\WorkerFunctions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Buyings;
use Session;
use DB;
use View;

class WorkerController extends Controller
{
	public function showPanel()
	{
		$order = Buyings::whereNotIn('state', 'zrealizowano')->get();
		return view('worker.workerPanel', compact('order'));
	}
	
	public function showOrder()
	{
		$order = Buyings::whereNotIn('state', 'zrealizowano')->get();
		return view('worker.workerPanel', compact($order));
	}
}