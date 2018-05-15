<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  public function __construct(){
    $this->middleware('auth'); //tik prisiregistravusiems//
  }

  public function addItem($dishId){
    $cart = Cart::where('user_id', Auth::user()->id)->first();
    if(!$cart){
      $cart = new Cart();
      $cart->user_id = Auth::user()->id;
      $cart->save();
    }

    $cartItem = new CartItem();
    $cartItem->cart_id = $cart->id;
    $cartItem->dish_id = $dishId;
    $cartItem->save();

    return redirect()->back();
  }

  public function showCart(){
    $cart = Cart::where('user_id', Auth::user()->id)->first();
    if(!$cart){
      $cart = new Cart();
      $cart->user_id = Auth::user()->id;
      $cart->save();
    }

    $items = $cart->cartItems;
    $totalPrice = 0;
    $totalItems = $cart->cartItems->Count();


    foreach($items as $item){
      $totalPrice += $item->dish->price;
    }


    return view('cart.cart', compact('totalPrice', 'totalItems', 'items'));
  }

  public function destroy(CartItem $cartItem)
  {
    $cartItem->delete();
    return redirect()->route('showCart')->with('success', 'Dish deleted successfully!');
  }
}
