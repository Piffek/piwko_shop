<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Items;
use Session;

class ProductsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = new Items();
        $items = Items::all();
        return view('admin.products.all_product',compact('items'));
    }
    
    public function addProduct()
    {
    	return view('admin.products.add');
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
        $item = new Items();
        $item -> produkt = $request -> product;
        $item -> wymiary = $request -> size;
        $item -> cena = $request -> price;
        $item -> rodzaj = $request -> kind;
        $item -> przeznaczenie = $request -> appropriaton;
        $item -> wymiary_ogolne = $request -> general_size;
        $item -> ilosc = $request -> amount;
        $item -> promocja = $request -> promotion;
        $item -> procent_promocji = $request -> percent_promotion;
        $item -> tekst_promocji = $request -> text_promotion;
        $item -> opis = $request -> desc;
        
        $item -> save();
        Session::flash('success','Dodano produkt');
        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
