@extends('layouts.master')


@section('header')
  @section('content')


<form method="POST" action="{{ route('main.update', $main)}}">
   @csrf
   @method('PUT')
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Enter main title" value="{{$main->title}}">
  </div>

  


  <button class="btn btn-primary btn-sm" href="#" role="button" name="submit">Update main</button>
</form>
</div>

@endsection
@endsection
