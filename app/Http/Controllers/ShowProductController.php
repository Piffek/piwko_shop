<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Items;
use App\Exceptions\UnidentifiedProductException;

class ShowProductController extends Controller
{
    public function index(Items $items,$id){
    	$items = Items::find($id);
    	if(!is_null($items)){
    		return view('showProduct.index',['items' => $items]);
    	}else{
    		throw new UnidentifiedProductException;
    	}
    }
}
