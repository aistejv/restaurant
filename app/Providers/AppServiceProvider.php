<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
     public function boot()
     {
     Schema::defaultStringLength(191);

     View::composer('layout.nav', function ($view) {
      if(Auth::check()){
       $cart = Cart::where('user_id', Auth::user()->id)->first();
       if(!$cart){
         $cart = new Cart();
         $cart->user_id = Auth::user()->id;
         $cart->save();
       }

       $totalItems = $cart->cartItems->Count();

       $view->with('totalItems', $totalItems);
     }
        });
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
