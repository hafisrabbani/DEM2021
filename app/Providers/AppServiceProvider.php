<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) 
        {
            $id = session('id');
            $data = DB::table('invoice_bid')
                        ->where('user_id',$id)
                        ->where('status',0)
                        ->count();
            $view->with('notif',$data);    
        }); 
    }
}
