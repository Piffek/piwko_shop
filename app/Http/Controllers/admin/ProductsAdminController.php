<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use File;
use Input;
use App\Http\Controllers\Controller;
use App\Items;
use Session;
use Image;
use Storage;


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
        return view('admin.products.allProducts',compact('items'));
    }
    
    public function addProduct()
    {
    	return view('admin.products.addProducts');
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
    
    public function addPhoto(Request $request)
    {
    	$this->validate($request, [
    			'image' => 'required|image|mimes:jpeg,jpg|max:2048',
    	]);
    	
    	$imageName = time().'.'.$request->image->getClientOriginalExtension();
    	$request->image->move(public_path('/pokaz_produkt/miniaturki/'.$request->photo_id), $imageName);
    	Session::flash('success','Dodano!');
    	return view('admin.photo.AddPhotoGallery')
    	->with(compact('imageName'))
    	->with('photo_id',$request->photo_id);
    	

    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
    			'image' => 'required|image|mimes:jpeg,jpg|max:2048',
    	]);
    	
    	if(Input::file())
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
    		
    		foreach(Items::where('produkt',$request->product)->cursor() as $id)
    		{		
    			File::makeDirectory('pokaz_produkt/miniaturki/'.$id->id);
    			$photo_id = $id->id;
	    		$image = Input::File('image');
	    		$filename = $id->id . '.' . $image->getClientOriginalExtension();
	    		$path = public_path('zdjecia/'. $filename);
	    		Image::make($image->getRealPath())->resize(200, 200)->save($path);

		    
    	
    		}
    		Session::flash('success','Dodaj miniaturki');
    		return view('admin.photo.AddPhotoGallery', compact('photo_id'));
    	}
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
    	$items = new Items();
        $items = Items::where('id',$id)->get();
        return view('admin.products.editProducts',compact('items'));
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
    	$item = Items::find($id);
    	$item -> produkt = $request -> input('product');
    	$item -> wymiary = $request -> input('size');
    	$item -> cena = $request -> input('price');
    	$item -> rodzaj = $request -> input('kind');
    	$item -> przeznaczenie = $request -> input('appropriaton');
    	$item -> wymiary_ogolne = $request -> input('general_size');
    	$item -> ilosc = $request -> input('amount');
    	$item -> promocja = $request -> input('promotion');
    	$item -> procent_promocji = $request -> input('percent_promotion');
    	$item -> tekst_promocji = $request -> input('text_promotion');
    	$item -> opis = $request -> input('desc');
    	$item -> save();
    	Session::flash('success','Edytowano');
    	return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Items::find($id);
        File::deleteDirectory(public_path('/pokaz_produkt/miniaturki/'.$id));
        File::Delete('zdjecia/'.$id.'.jpg');
        if(!is_null($item))
        {
        	$item->delete();
        }
        Session::flash('success','Usunięto produkt');
        return redirect()->action('Admin\ProductsAdminController@index');
    }
}
