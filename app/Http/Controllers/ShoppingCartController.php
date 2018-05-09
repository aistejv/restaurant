<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\Dish;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function addToCart(Request $request){
      $id = $request->input('id');
      $dish = Dish::findorfail($id);
      $oldCart = (Session::has('cart')) ? Session::get('cart') : null;
      $shoppingCart = new ShoppingCart($oldCart);
      $shoppingCart->add($dish);

      $request->session()->put('cart', $shoppingCart);

      return redirect()->back();
    }

    public function index(){
      $shoppingCart = (Session::has('cart')) ? Session::get('cart') : null;
      // dd($shoppingCart);
      return view('cart.index', compact('shoppingCart'));
    }
}
