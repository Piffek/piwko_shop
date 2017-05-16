<?php

namespace App\Http\Controllers\AdminFunctions;

use App\Http\Controllers\Controller;
use App\Kinds;
use App\Items;
use File;
use Illuminate\Http\Request;
use Image;
use Input;
use Session;
use Storage;


class ProductsAdminController extends Controller
{

    public function index(){
        $items = new Items();
        $items = Items::all();
        $kind = kinds::all();
	    
        return view('admin.products.allProducts',compact('items'), compact('kinds'));
    }
    
    public function addProduct(){
    	return view('admin.products.addProducts');
    }

    public function store(Request $request){
    	$this->validate($request, [
    			'image' => 'required|image|mimes:jpeg,jpg|max:2048',
    	]);
    	
    	if(Input::file()){
    		Items::create($request->all());
    		
    		foreach(Items::where('product',$request->product)->cursor() as $id){	
    			$photo_id = $id->id;
    			File::makeDirectory('pokaz_produkt/miniaturki/'.$id->id);
    			$file = $request->file('image');
	    		$image = Input::File('image');
	    		$filename = $id->id . '.' . $image->getClientOriginalExtension();
	    		Storage::disk('item')->put($filename, File::get($file));
    		}
    		Session::flash('success','Dodaj miniaturki');
    		return view('admin.photo.AddPhotoGallery', compact('photo_id'));
    	}else {
    		Session::flash('success','Cos poszło nie tak');
    		return redirect()->back();
    	}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Items  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $id){
    	$item= clone $id;
    	$kinds=Kinds::all();
    	$files = File::allFiles('pokaz_produkt/miniaturki/'.$id->id.'');
  
        return view('admin.products.editProducts',compact('item','files','kinds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Items  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Items $id){
    	$id->update($request->all());
    	Session::flash('success','Dane produktu zmieniono pomyślnie');
    	return redirect()->back();  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Items  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Items $id){
        File::deleteDirectory(public_path('/pokaz_produkt/miniaturki/'.$id->id));
        Storage::disk('item')->delete($id->id.'.jpg');
        $id->delete();
        Session::flash('success','Usunięto produkt');
        return redirect()->action('AdminFunctions\ProductsAdminController@index');
    }
}
