@extends('layouts.master')

@section('header')
  @section('content')
    <h1>Order : {{$order->id}} </h1>

  <div class="container">
    <div class="row">
      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Order ID: {{$order->id}}</th>
            <th scope="col">User ID: {{$order->user_id}}</th>
          </tr>
          <tr>
            <th scope="col">Dish title</th>
            <th scope="col">Dish price</th>
          </tr>
        </thead>
        <tbody>
          {{-- <tr>
          @foreach($order as $order)
            <td>{{$order->id}}</td>
            <td>{{$order->created_at}}</td>
            <td>{{$order->total_paid}} &euro;</td>
          </tr>
        @endforeach --}}

        <tr>


        @foreach($order->orderItems as $item)
          <td>{{$item->dish->title}}</td>
          <td>{{$item->dish->price}} &euro;</td>
        </tr>
      @endforeach
        </tbody>
      </table>
    </div>
  </div>


@endsection

@section('content')
