@extends('layouts.master')

@section('header')
  @section('content')
    <h1>Mains</h1>
    @if(session('success'))
      <div class="alert alert-success col-sm-2 my-5">
        {{session('success')}}
      </div>
    @endif
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <p class="mb-0"><a href="{{route('create.main')}}" class="btn btn-primary btn-sm">Add a new main</a></p>
      </div>
    </div>
        <div class="row">
          <table class="table table-striped table-dark ">
            <thead>
              <tr>
                <th scope="col">Title of Main</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              @foreach($mains as $main)
                <td>{{$main->title}}</td>
                <td>
                  <form method="POST" action="{{route('main.delete', $main)}}">
                    @method('DELETE')
                    @csrf
                    <p class="mb-0"><button type="submit" href="#" class="btn btn-primary btn-sm">Delete</button></p>
                  </form>
                  <p class="mb-0"><a href="{{route('main.edit', $main->id)}}" class="btn btn-primary btn-sm">Edit</a></p>
                </td>
              </tr>

            @endforeach
            </tbody>
          </table>
        </div>
      </div>


  @endsection

  @section('content')
