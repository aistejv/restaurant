<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function show(){
    $orders = Auth::user()->orders;

    $orders->transform(function($order,$key){
      $order->cart = unserialize($order->cart);
      return $order;
    });
    $orders->all();
    return view('users.profile', compact('orders'));
  }
}
