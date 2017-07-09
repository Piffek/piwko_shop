<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contract\RepositoryInterface;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

abstract class Repository implements RepositoryInterface
{
    
    public function __construct(Container $app){
        $this->app = $app;
        $this->makeModel();
    }
    
    public function makeModel(){
        $model = $this->app->make($this->model());
        
        if(!$model instanceof Model){
            throw new \Exception('Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model');
        }
           
        return $this->model = $model;
 
    }
    
    abstract function model();
    
    public function where($id, $columns = array('*')){
        return $this->model->where($id, $columns);
    }
    
    public function all($columns = array('*')){
        return $this->model->get($columns);
    }

    public function find($id, $columns = array('*')){
        return $this->model->find($columns, $id);
    }

    public function create(array $data){
        return $this->model->create($data);
    }

    public function update(array $data, $id, $attribute="id"){
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    public function findBy($attribute, $value, $columns = array('*')){
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    public function delete($id){
        return $this->model->destroy($id);
    }
    
   
    

    
}