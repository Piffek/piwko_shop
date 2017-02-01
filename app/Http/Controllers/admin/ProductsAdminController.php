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
    
    public function store(Request $request)
    {
    	$this->validate($request, [
    			'image' => 'required|image|mimes:jpeg,jpg|max:2048',
    	]);
    	
    	if(Input::file())
    	{
    		Items::create($request->all());
    		
    		foreach(Items::where('produkt',$request->produkt)->cursor() as $id)
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
     * @param  Items  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $id)
    {
    	$item= clone $id;
        return view('admin.products.editProducts',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Items  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Items $id)
    {
    		$id->update($request->all());
    	
	    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Items  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Items $id)
    {
        File::deleteDirectory(public_path('/pokaz_produkt/miniaturki/'.$id->id));
        File::Delete('zdjecia/'.$id->id.'.jpg');
        $id->delete();
        Session::flash('success','Usunięto produkt');
        return redirect()->action('Admin\ProductsAdminController@index');
    }
}
