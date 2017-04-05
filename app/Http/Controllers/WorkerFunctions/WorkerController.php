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
		$order = Buyings::where('state', '!=', 'zrealizowano')->get();
		return view('worker.workerPanel', compact('order'));
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Buyings  $id
	 * @return \Illuminate\Http\Response
	 */
	public function changeState(Request $request, Buyings $id)
	{
		$id->state = $request->state;
		$id->save();
		return redirect()->back();
	}
	
}