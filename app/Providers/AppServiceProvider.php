<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Kinds;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	
        $kinds = Kinds::all();
		 view()->share('kinds',$kinds);
		 
 
		 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
