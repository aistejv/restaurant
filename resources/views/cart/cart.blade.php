@extends('layout.master')

@section('content')
  @if(session('success'))
      <div class="alert alert-success col-sm-2 my-5">
        {{session('success')}}
      </div>
  @endif

<div class="container">
  <h2>Your shopping cart</h2>
  <div class="row">
    <div class="col-md-4 my-2">

      <ul>
        @foreach($items as $item)
        <li><img src="{{$item->dish->image_url}}" alt="dish-image"></li>
        <li>Dish title: {{$item->dish->title}}</li>
        <li>Dish price: {{$item->dish->price}} &euro;</li>
        <form class="" action="{{route('itemCart.delete', $item)}}"  method="post">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-secondary btn-lg">Remove dish from your shopping cart</button>
        </form>
        @endforeach
      </ul>

    </div>
    <div class="col-md-4 my-2">
      <ul>
        <li>Total items: {{$totalItems}}</li>
        <li>Total price: {{$totalPrice}} &euro;</li>
        <a href="" class="btn btn-secondary btn-lg">Continue shopping</a>
        <a href="" class="btn btn-secondary btn-lg">Checkout</a>
      </ul>
    </div>
  </div>
</div>
@endsection
