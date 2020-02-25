<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;


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
         
        $this -> app -> bind('path.public', function()
{
        return base_path('public_html');
});
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
       

       $ped = DB::table('orders')->get()->where('pendiente','=',1);
       $sto = DB::table('stores')->get();
        
      
       View::share(['ped' => $ped, 'sto' => $sto]);
    }
}
