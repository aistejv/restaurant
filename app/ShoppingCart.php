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

  public function removeProduct($id){
    $this->totalQuantity -= $this->product[$id]['quantity'];
    $this->totalPrice -= $this->product[$id]['price'];
    unset($this->product[$id]);
  }

  public function removeByOne($id){
    $this->totalQuantity --;
    $this->totalPrice -= $this->product[$id]['item']['price'];
    $this->product[$id]['quantity']--;
    $this->product[$id]['price']-= $this->product[$id]['item']['price'];;
    if($this->product[$id]['quantity']== 0){
      unset($this->product[$id]);
    }

  }

}
