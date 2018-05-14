<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
  public function checkout(){
    $cart = Session::get('cart');
          $order =new Order();
          $order->cart = serialize($cart); //serialize padaro i stringa
          Auth::user()->orders()->save($order);//cia auth kad hauti useri, galima naudoti auth nes route nurodeme middleware, kuris pasako jog turi buti prisijunges
          //cia orderis is metodo aprasyto user.php
          Mail::to(Auth::user())->send(new OrderShipped($cart)); //laiska issiuncia pirkejui
          Session::forget("cart");


          return redirect()->route('welcome')->with('susimokejai,sveikinu');
}

}
