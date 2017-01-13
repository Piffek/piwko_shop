<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Kinds;
use Carbon\Carbon;
use App\User;
use App\Buyings;
use App\LogOnData;



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
		 
		 $current = Carbon::now();
		 $current = new Carbon();
		 	
		 
		 $today = $current->toDateString();
		 $new_user = User::where('created_at', $today)->count();
		 	
		 $new_order = Buyings::where('created_at',$today)->count();
		 	
		 $new_order_from_singoff = LogOnData::where('created_at',$today)->count();
		 //return view('admin.index',compact('new_user'),compact('new_order'),compact('new_order_from_singoff'));
		view()->share('new_user', $new_user);
		view()->share('new_order', $new_order);
		view()->share('new_order_from_singoff', $new_order_from_singoff);

		 
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
