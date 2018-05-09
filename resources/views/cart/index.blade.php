@extends('layout.master')

@section('content')



  <div class="container">
    <h1><i class="fas fa-shopping-basket"></i> Your Shopping Cart:</h1>

    <div class="row">
    @if($shoppingCart->totalQuantity !==0 )
      @foreach($shoppingCart->product as $product)
        <div class="col-md-5 ftco-animate">
          <h5 class="mt-0">Dish: {{$product['item']['title']}}</h5>
          <img class="mr-2 img-thumbnail" src="{{$product['item']['image_url']}}" class="img-fluid" alt="image">
          {{-- <p>{{$product['item']['description']}}</p> --}}
          <h6 class="text-primary menu-price">Quantity: {{$product['quantity']}}
            <form method="post" action="{{route('add.cart')}}">
            @csrf
            <input type="hidden" name="id" value="{{$product['item']['id']}}">
          <button type="submit" class="btn btn-primary btn-sm">+</button>
          </form>
          <form method="post" action="{{route('deleteByOne')}}">
          @csrf
          <input type="hidden" name="id" value="{{$product['item']['id']}}">
        <button type="submit" class="btn btn-primary btn-sm">-</button>
        </form></h6>
          <h6 class="text-primary"> Total price: {{$product['item']['price']}} &euro; X {{$product['quantity']}} = {{$product['price']}} &euro;</h6>
          <form method="post" action="{{route('cart.dish.delete')}}">
            @csrf
            <input type="hidden" name="id" value="{{$product['item']['id']}}">
          <button type="submit" class="btn btn-primary btn-lg">Remove dish from the cart</button>
          </form>
        </div>
      @endforeach
    </div>

    <div class="row">
      <div class="col-md-4 my-2">
        <h5>Total number of dishes: {{$shoppingCart->totalQuantity}}.</h5>
        <h4>Total order sum: {{$shoppingCart->totalPrice}} &euro;</h4>
        <h4>Total TAX: {{round(($shoppingCart->totalPrice)*0.21, 2)}} &euro;</h4>
        <h4>Total sum with TAX: {{round(($shoppingCart->totalPrice)*1.21, 2)}} &euro;</h4>
      </div>
    </div>

    @else
        <h4>Shoping cart is empty</h4>
    @endif
  </div>
</div>
@endsection
