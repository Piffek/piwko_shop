<?php

namespace App\Http\Controllers\AdminFunctions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Input;
use App\Http\Controllers\Controller;
use App\Items;
use Session;
use Image;


class PhotoController extends Controller
{
	
	public function deletePhotoDuringEdit($id){
		Storage::disk('item')->delete($id.'.jpg');
		Session::flash('success', 'Pomyslnie usunięto zdjęcie');
		return redirect()->back();
	}
	
	public function deletePhotoGalleryDuringEdit($id, $file){
		File::Delete('pokaz_produkt/miniaturki/'.$id.'/'.$file);
		Session::flash('success', 'Pomyslnie usunięto zdjęcie');
		return redirect()->back();
	}
	
	
	public function addPhotoDuringEditProduct(Request $request){
		$this->validate($request, [
				'image' => 'required|image|mimes:jpeg,jpg|max:2048',
		]);
		 
		if(Input::file()){
			
			foreach(Items::where('id',$request->input('id'))->cursor() as $id){
				$file = $request->file('image');
				$photo_id = $id->id;
				$image = Input::File('image');
				$filename = $id->id . '.' . $image->getClientOriginalExtension();
				Storage::disk('item')->put($filename, File::get($file));
			}
			
			Session::flash('success', 'Dodano zdjęcie');
			return redirect()->back();
		}
	}
	
	public function addPhotoGalleryDuringAddProduct(Request $request){
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
	
	public function editPhotoGalleryDuringEditProduct(Request $request){
		$this->validate($request, [
			'image' => 'required|image|mimes:jpeg,jpg|max:2048',
		]);
		$imageName = time().'.'.$request->image->getClientOriginalExtension();
		$request->image->move(public_path('/pokaz_produkt/miniaturki/'.$request->id), $imageName);
		Session::flash('success','Dodano nowe zdjęcie do galerii!');
		return redirect()->back();
	}
	
	public function getItemPhoto($file){
		$image = Storage::disk('item')->get($file);
		return $image;
	}
	

}
