<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function product()
    {
    	return $this->hasOne('App\Items');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password', 'surname', 'street', 'city', 'phone', 'companyname', 'nip','activated','token',
    ];

    protected $guarded = ['_token'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //dzięki tej metodzie, eloquent będzie wiedział, jak szukać ról i jak dodać do roli
    public function roles()
    {
    	return $this->belongsToMany(Roles::class, 'roles_has_users','users_id', 'roles_id')
    	->withTimestamps();
    }
    
    
    
    public function getEmail($id)
    {
    	
    }
    
    
    //sprawdza czy jest to tablica czy string
    public function hasAnyRole($roles)
    {
    	if(is_array($roles))
    	{
    		foreach($roles as $role)
    		{
    			if($this->hasRole($role))
    			{
    				return true;
    			}
    		}
    	}else if($this->hasRole($roles))
    	{
    		return true;
    	}
    	return false;
    }
    
    //sprawdza na obiekcie roles(), jaką ma user ma role
    public function hasRole($role)
    {
    	if($this->roles()->where('name', $role)->first())
    	{
    		return true;
    	}
    	return false;
    }
    
    
    public static function boot()
    {
    	parent::boot();
    	
    	static::creating(function($user)
    	{
    		$user->token = str_random(40);
    	});
    }
    
    public function hasVerified()
    {
    	$this->activated = true;
    	$this->token=0;
    	
    	$this->save();
    }
    
    
    
    
    
    
    
}
