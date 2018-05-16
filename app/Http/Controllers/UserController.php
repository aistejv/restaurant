<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;

class UserController extends Controller
{
  public function __construct(){
    $this->middleware('auth'); //tik prisiregistravusiems//
  }

  public function show(){
    $orders = Order::where('user_id', Auth::user()->id)->get();
    return view('users.profile', compact('orders'));
  }
}
