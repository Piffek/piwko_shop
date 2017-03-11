<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Roles;
use Session;


class RolesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$roles = Roles::all();
        return view('admin.roles.add',compact('roles'));
    }
    
    public function addRole(Request $request)
    {
    	Roles::create($request->all());
    	Session::flash('success','Dodano nową role');
    	return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Roles  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $id)
    {
        $id->update($request->all());
        Session::flash('success', 'Pomyślnie edytowano role');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Roles  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $id)
    {
        $id->delete();
        Session::flash('success', 'Usunięto role');
        return redirect()->back();
    }
}
