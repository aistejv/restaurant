<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\CartItem;
use App\Order;
use App\OrderItem;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
  public function __construct(){
    $this->middleware('auth'); //tik prisiregistravusiems//
  }

  public function checkout(){

    $cart = Cart::where('user_id', Auth::user()->id)->first();
    $total_paid = 0;
    foreach($cart->cartItems as $cartItem){
      $total_paid += $cartItem->dish->price;
    }
    $order = new Order();
    $order->total_paid = $total_paid;
    $order->user_id = Auth::user()->id;
    $order->save();

   foreach($cart->cartItems as $cartItem){
    $orderItem = new OrderItem();
    $orderItem->order_id = $order->id;
    $orderItem->dish_id = $cartItem->dish_id;

    $orderItem->save();
    // CartItem::delete($cartItem->id); //galima ir taip istrinti krepseli//
  }

    $cart->delete();

  return redirect()->route('welcome')->with('success', 'Thank you for shopping!');
  }

  public function adminIndex(){
    $orders = Order::all();
    return view('admin.orders.index', compact('orders'));
  }

  public function adminShow($id){
    $order = Order::find($id);
    // dd($order->orderItems);
    return view('admin.orders.order', compact('order'));
  }

}


// $order->orderItems
