@extends('layout.master')
@section('content')
<div class="container">
  <h1>Jusu uzsakymas</h1>
  <div class="row">
  @foreach ($orders as $order)
  {{-- {{dd($order)}} --}}
  <h2>Data:{{$order->created_at}}</h2>
  {{-- {{dd($order->cart)}} --}}
    @foreach ($order->cart->product as $item )
      <li>Preke: {{$item['item']['title']}}</li><br>
      <li>Kiekis: {{$item['quantity']}}</li><br>
      <li>Kaina: {{$item['price']}}</li><br>
    @endforeach
  <h4>Viso kaina:{{$order->cart->totalPrice}}</h4><br>
  @endforeach
  </div>
</div>

@endsection
