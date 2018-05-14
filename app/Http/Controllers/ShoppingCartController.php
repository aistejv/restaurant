<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\Dish;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function addToCart(Request $request){
      $plius=$request->input('name');
      $id = $request->input('id');
      $dish = Dish::findorfail($id);
      $oldCart = (Session::has('cart')) ? Session::get('cart') : null;
      $shoppingCart = new ShoppingCart($oldCart);
      $shoppingCart->add($dish);

      $request->session()->put('cart', $shoppingCart);

      // return redirect()->back();
      if(isset($plius)){
      return redirect()->back();
      }else{
      return response()->json($shoppingCart);
      }

    }

    public function index(){
      $shoppingCart = (Session::has('cart')) ? Session::get('cart') : null;
      // dd($shoppingCart);
      return view('cart.index', compact('shoppingCart'));
    }

    public function destroy(Request $request){
      // dd($request);
      $id = $request->input('id');
      $oldCart = (Session::has('cart')) ? Session::get('cart') : null;
      $shoppingCart = new ShoppingCart($oldCart);
      $shoppingCart->removeProduct($id);

      $request->session()->put('cart', $shoppingCart);

      return redirect()->back();

    }

    public function deleteByOne(Request $request){
      $id = $request->input('id');
      $oldCart = (Session::has('cart')) ? Session::get('cart') : null;
      $shoppingCart = new ShoppingCart($oldCart);
      $shoppingCart->removeByOne($id);

      $request->session()->put('cart', $shoppingCart);

      return redirect()->back();
    }
}
