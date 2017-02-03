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


class PhotoController extends Controller
{
	
	public function deletePhotoDuringEdit($id)
	{
		File::Delete('zdjecia/'.$id.'.jpg');
		Session::flash('success','Pomyslnie usunięto zdjęcie');
		return redirect()->back();
	}
	
	public function deletePhotoGalleryDuringEdit($id, $file)
	{
		File::Delete('pokaz_produkt/miniaturki/'.$id.'/'.$file);
		Session::flash('success','Pomyslnie usunięto zdjęcie');
		return redirect()->back();
	}
	
	
	public function addPhotoDuringEditProduct(Request $request)
	{
		$this->validate($request, [
				'image' => 'required|image|mimes:jpeg,jpg|max:2048',
		]);
		 
		if(Input::file())
		{
			
			foreach(Items::where('id',$request->input('id'))->cursor() as $id)
			{
				$photo_id = $id->id;
				$image = Input::File('image');
				$filename = $id->id . '.' . $image->getClientOriginalExtension();
				$path = public_path('zdjecia/'. $filename);
				Image::make($image->getRealPath())->resize(200, 200)->save($path);
			}
			
			Session::flash('success','Dodano zdjęcie');
			return redirect()->back();
		}
	}
	
	public function addPhotoGalleryDuringAddProduct(Request $request)
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
	
	public function editPhotoGalleryDuringEditProduct(Request $request)
	{
		$this->validate($request, [
				'image' => 'required|image|mimes:jpeg,jpg|max:2048',
		]);
		$imageName = time().'.'.$request->image->getClientOriginalExtension();
		$request->image->move(public_path('/pokaz_produkt/miniaturki/'.$request->id), $imageName);
		Session::flash('success','Dodano nowe zdjęcie do galerii!');
		return redirect()->back();
	}
	

}