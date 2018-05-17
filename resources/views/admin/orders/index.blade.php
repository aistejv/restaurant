@extends('layouts.master')

@section('header')
  @section('content')
    <h1>Orders</h1>

  <div class="container">
    <div class="row">
      <table class="table table-striped table-dark ">
        <thead >
          <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Order Date</th>
            <th scope="col">Order Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          @foreach($orders as $order)
            <td> <a href="{{route('admin.order', $order->id)}}">{{$order->id}}</td></a>
            <td>{{$order->created_at}}</td>
            <td>{{$order->total_paid}} &euro;</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>


@endsection

@section('content')
