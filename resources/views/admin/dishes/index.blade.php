@extends('layouts.master')


@section('header')
  @section('content')
    <h1>Dishes</h1>
    @if(session('success'))
      <div class="alert alert-success col-sm-2 my-5">
        {{session('success')}}
      </div>
    @endif
    <div class="row">
      <div class="col-md-2">
        <p class="mb-0"><a href="{{route('add.dish')}}" class="btn btn-primary btn-sm">Add a dish</a></p>
      </div>
    </div>


        <div class="row">
          @foreach($dishes as $dish)
          <div class="col-md-3 ftco-animate">
            <div class="media menu-item">
              <img class="mr-3" src="{{$dish->image_url}}" class="img-fluid" alt="image">
              <div class="media-body">
                <h5 class="mt-0">{{$dish->title}}</h5>
                <p>{{$dish->description}}</p>
                <h6 class="text-primary menu-price">{{$dish->price}} &euro;</h6>
                <p class="mb-0"><a href="{{route('dish.edit', $dish->id)}}" class="btn btn-primary btn-sm">Edit</a></p>
                <form method="POST" action="{{route('dish.delete', $dish)}}">
                  @method('DELETE')
                  @csrf
                  <p class="mb-0"><button type="submit" href="#" class="btn btn-primary btn-sm">Delete</button></p>
                </form>
              </div>
            </div>
          </div>
        @endforeach


@endsection


@endsection
