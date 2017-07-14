<?php

namespace App\Service;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\SocialAccount;
use App\User;

class SocialAccountService
{
	public function createOrGetUser(ProviderUser $providerUser){

		$account = SocialAccount::where('provider', 'facebook')
			->where('provider_user_id', $providerUser->getId())
			->first();
		
			if($account){
				
				return $account->user();
				
			}else{
				
				$account = new SocialAccount([
						'provider_user_id' => $providerUser->getId(),
						'provider' => 'facebook'
				]);
				
				$user = User::where('email', $providerUser->getEmail())->first();
				
				if(!$user){
					
					$user = User::create([
							'email' => $providerUser->getEmail(),
							'name' => $providerUser->getName()
					]);
					
					
					
				}
				$account->user()->associate($user);
				$account->save();
				
				return $user;
				
			}
		
	}
}

