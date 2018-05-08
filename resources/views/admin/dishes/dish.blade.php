@extends('layouts.master')

@section('content')


  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="media d-block mb-4 text-center ftco-media ftco-animate">
      <img src="{{$dish->image_url}}" alt="Free Template by Free-Template.co" class="img-fluid">
      <div class="media-body p-md-5 p-4">
        <h5 class="mt-0 h4">{{$dish->title}}</h5>
        <p class="mb-4">{{$dish->description}}.</p>
      </div>

        <div class="col-md-6">
          <a class="btn btn-primary btn-sm" href="{{route('dish.edit', $dish)}}" role="button">Edit dish</a>
        </div>
        <form method="POST" action="{{route('dish.delete', $dish)}}">
          @method('DELETE')
          @csrf
        <p class="mb-0"><button type="submit" href="#" class="btn btn-primary btn-sm">Delete</button></p>
        </form>
    </div>
  </div>

@endsection
