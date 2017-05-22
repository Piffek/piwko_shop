<?php

namespace App\Http\Controllers\FacebookApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Service\SocialAccountService;

class SocialAuthController extends Controller
{
    public function redirect(){
    	
    	return Socialite::driver('facebook')->redirect();
    	
    }
    
    public function callback(SocialAccountService $service){
    	$user = $service->createOrGetUser(Socialite::driver('facebook')->user());
    	var_dump($user);
    	//auth()->login($user);
    	
    	//return redirect()->to('/home');
    }
}
