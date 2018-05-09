@extends('layout.master')

@section('content')



  <div class="container">
    <h1><i class="fas fa-shopping-basket"></i> Your Shopping Cart:</h1>
  @foreach($shoppingCart->product as $product)
  <div class="row">
    <div class="col-md-5 ftco-animate">
      <h5 class="mt-0">Dish: {{$product['item']['title']}}</h5>
      <p>{{$product['item']['description']}}</p>
      <h6 class="text-primary menu-price">Quantity: {{$product['quantity']}}</h6>
      <h6 class="text-primary"> Total price: {{$product['item']['price']}} &euro; X {{$product['quantity']}} = {{$product['price']}} &euro;</h6>
    </div>
  </div>
  @endforeach

  <div class="row">
    <div class="col-md-4 my-2">
      <h5>Total number of dishes: {{$shoppingCart->totalQuantity}}.</h5>
      <h4>Total order sum: {{$shoppingCart->totalPrice}} &euro;</h4>
    </div>
  </div>
</div>


@endsection
