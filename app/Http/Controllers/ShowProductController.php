<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ItemsRepository as Item;
use App\Exceptions\UnidentifiedProductException;

class ShowProductController extends Controller
{
    public function __construct(Item $item){
        $this->item = $item;
    }
    
    /**
     * Add new product to basket.
     *
     * @param  Item $id
     * @return \Illuminate\Http\Response || App\Exceptions\UnidentifiedProductException
     */
    public function index($id){
        $items = $this->item->find($id);
        
    	if(is_null($items)){
    	    throw new UnidentifiedProductException;
    	}
    	$directory = 'pokaz_produkt/miniaturki/%d';
    	$files = \File::allFiles(sprintf($directory, $id));
    	return view('showProduct.index',[
    	    'items' => $items,
    	    'files' => $files,
    	    
    	]);
    }
}
