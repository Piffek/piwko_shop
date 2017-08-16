<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Auth;

class BasketsRepository extends Repository{
    
    public function model(){
        return 'App\Baskets';
    }
    
    public function orIsset($id)
    {
        $itemInBasketCurrentUser = $this->model->where(
            ['id_product' => $id],
            ['id_user' => Auth::user()->id]
            )->count();
            
            if($itemInBasketCurrentUser > 0)
            {
                return true;
            }
            
    }
    
    public function itemThisUser()
    {
        if(Auth::check())
        {
            return $this->model->where('id_user', Auth::user()->id)->get();
        }else
        {
            return NULL;
        }
    }
    
    public function itemCountThisUser()
    {
        if(Auth::check())
        {
            return $this->model->where('id_user', Auth::user()->id)->count();
        }else
        {
            return NULL;
        }
    }
}