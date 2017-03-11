<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kinds;
use Session;

class KindAdminController extends Controller
{
	
	
	public function index()
	{
		return view('admin.kinds.index');
	}
	
	
	
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Kinds  $id
	 * @return \Illuminate\Http\Response
	 */
	public function addKinds(Request $request, Kinds $id)
	{
		$id->create($request->all());
		Session::flash('success','Dodano nową kategorie.');
		return redirect()->back();
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Kinds  $id
	 * @return \Illuminate\Http\Response
	 */
	public function editKinds(Request $request,Kinds $id)
	{
		$id->update($request->all());
		Session::flash('success','Pomyslnie edytowano.');
		return redirect()->back();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Kinds  $id
	 * @return \Illuminate\Http\Response
	 */
	public function deleteKinds(Kinds $id)
	{
		$id->delete();
		Session::flash('success','Usunięto kategorie.');
		return redirect()->back();
	}





}