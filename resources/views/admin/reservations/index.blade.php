@extends('layouts.master')

@section('header')
  @section('content')
    <h1>Reservations</h1>
    @if(session('success'))
      <div class="alert alert-success col-sm-2 my-5">
        {{session('success')}}
      </div>
    @endif
    <div class="row">
      <div class="col-md-2">
        <p class="mb-0"><a href="{{route('create.reservation')}}" class="btn btn-primary btn-sm">Add a reservation</a></p>
      </div>
    </div>


        <div class="row">
          @foreach($reservations as $reservation)
          <div class="col-md-3 ftco-animate">
              <div class="media-body">
                <h5 class="mt-0">Name: {{$reservation->name}}</h5>
                <h5 class="mt-0">Surname: {{$reservation->surname}}</h5>
                <h5 class="mt-0">Email: {{$reservation->email}}</h5>
                <h5 class="mt-0">Number of persons: {{$reservation->number_of_persons}}</h5>
                <h5 class="mt-0">Date: {{$reservation->date}}</h5>
                <h5 class="mt-0">Time: {{$reservation->time}}</h5>
                <h5 class="mt-0">Phone: {{$reservation->phone}}</h5>

                <p class="mb-0"><a href="{{route('reservation.edit', $reservation->id)}}" class="btn btn-primary btn-sm">Edit</a></p>
                <form method="POST" action="{{route('reservation.delete', $reservation)}}">
                  @method('DELETE')
                  @csrf
                  <p class="mb-0"><button type="submit" href="#" class="btn btn-primary btn-sm">Delete</button></p>
                </form>
              </div>
          </div>
        @endforeach


@endsection


@endsection
