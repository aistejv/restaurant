<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

// class ShoppingCart extends Model

class ShoppingCart
{
  public $product = null;
  public $totalQuantity;
  public $totalPrice;

  public function __construct($oldCart){
    if($oldCart){
    $this->product = $oldCart->product;
    $this->totalQuantity = $oldCart->totalQuantity;
    $this->totalPrice = $oldCart->totalPrice;
    }
  }

  public function add($dish){
    $storeItem = ['quantity' => 0, 'price' => $dish->price, 'item' => $dish];

    if($this->product){
      if(array_key_exists($dish->id, $this->product)){
        $storeItem = $this->product[$dish->id];
      }
    }
    $storeItem['quantity']++;
    $storeItem['price']=$dish->price*$storeItem['quantity'];
    $this->product[$dish->id] = $storeItem;

    $this->totalQuantity ++;
    $this->totalPrice += $dish->price;
  }

}
