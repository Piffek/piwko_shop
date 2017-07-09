<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckRole
{
    
    public function handle($request, Closure $next){
    	if($request->user() === null){
    		return redirect('/');
    	}
        
    	$actions = $request->route()->getAction();
    	$roles = isset($actions['roles']) ? $actions['roles'] : null;
    	if($request->user()->hasAnyRole($roles)){
        	return $next($request);
    	}
    	return redirect('/');
    }
}
