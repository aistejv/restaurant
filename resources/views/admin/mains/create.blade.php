@extends('layouts.master')


  @section('content')
    <h1>Mains</h1>
    @if(session('success'))
      <div class="alert alert-success col-sm-2 my-5">
        {{session('success')}}
      </div>
    @endif




    <form method="POST" action="{{route('main.store')}}">
       @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" placeholder="Enter main title" value="{{old('title')}}">
        @if ($errors->has('title'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
      </div>




      <button class="btn btn-primary btn-sm" href="#" role="button" name="submit">Add new main</button>
    </form>
    </div>




@endsection
