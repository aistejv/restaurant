@extends('layout.master')
@section('content')
<div class="container">

  <div class="row">
    <h2>Your orders</h2>
      <div class="col-lg-6 col-md-6 col-sm-6">
        @foreach($orders as $order)
      <div class="media d-block text-center ftco-media ftco-animate">
          <h5 class="mt-0 h4">Order ID: {{$order->id}}</h5>
          <h4 class="mb-4">Order date: {{$order->created_at}}.</h4>
          <h4 class="mb-4">Order sum: {{$order->total_paid}} &euro;.</h4>
      </div>
    @endforeach
    </div>
  </div>
</div>



@endsection
