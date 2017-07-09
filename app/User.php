<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'id','name', 'email', 'password', 'surname', 'street', 'city', 'phone', 'companyname', 'nip','activated','token',
    ];

    protected $guarded = ['_token'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function product(){
        return $this->hasOne('App\Items');
    }
  
    public function roles(){
        return $this->belongsToMany(Roles::class, 'roles_has_users','users_id', 'roles_id')
        ->withTimestamps();
    }
    
    
    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else if($this->hasRole($roles)){
            return true;
        }
        return false;
    }
    
    public function hasRole($role){
        if($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }
    
    
    
    public static function boot(){
        parent::boot();
        static::creating(function($user){
            $user->token = str_random(40);
        });
    }
    
    public function hasVerified(){
        $this->activated = true;
        $this->token=0;
        $this->save();
    }
    
    public function toDoList(){
        
        return $this->hasMany('App\ToDoList', 'id_user');
        
    }
    
    public function getRolesUser(){
        foreach(Auth::user()->roles as $role){
            return $role;
        }
    }
    
    
    
}
