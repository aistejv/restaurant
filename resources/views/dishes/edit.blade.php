@extends('layouts.master')

@section('content')
  <section class="ftco-cover" style="background-image: url(images/bg_3.jpg);" id="section-home">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center ftco-vh-10">
        <div class="col-md-12">
          <h1 class="ftco-heading ftco-animate mb-3">Edit dish</h1>
        </div>
      </div>
    </div>
  </section>
<div class="col-md-8 my-5"> 

  <form method="POST" action="{{route('dish.update', $dish)}}">
    @method ('PUT')
     @csrf
    <div class="form-group ">
      <label for="title">Title</label>
      <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" placeholder="Enter dish title" value="{{$dish->title}}">
      @if ($errors->has('title'))
          <span class="invalid-feedback">
              <strong>{{ $errors->first('title') }}</strong>
          </span>
      @endif
    </div>
    <div class="form-group">
      <label for="description">Dish description</label>
      <input type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description" placeholder="Description of the dish" value="{{$dish->description}}">
      @if ($errors->has('description'))
          <span class="invalid-feedback">
              <strong>{{ $errors->first('description') }}</strong>
          </span>
      @endif
    </div>
    <div class="form-group">
      <label for="price">Dish price</label>
      <input type="number" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" id="price" name="price" placeholder="Price" value="{{$dish->price}}">
      @if ($errors->has('price'))
          <span class="invalid-feedback">
              <strong>{{ $errors->first('price') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group">
      <label for="main">Main</label>
      <select id="main" class="form-control {{ $errors->has('main_id') ? ' is-invalid' : '' }}" name="main_id">

        @foreach($mains as $main)
        <option  value="{{$main->id}}"
           {{$dish->main_id == $main->id ? 'selected' : ''}}>{{$main->title}}</option>
        @endforeach
      </select>
      @if ($errors->has('main_id'))
          <span class="invalid-feedback">
              <strong>{{ $errors->first('main_id') }}</strong>
          </span>
      @endif
    </div>


    <div class="form-group">
      <label for="image">Dish picture</label>
      <input type="text" name="image_url" class="form-control {{ $errors->has('image_url') ? ' is-invalid' : '' }}" id="image" placeholder="Image url" value="{{$dish->image_url}}">
      @if ($errors->has('image_url'))
          <span class="invalid-feedback">
              <strong>{{ $errors->first('image_url') }}</strong>
          </span>
      @endif
    </div>


    <button class="btn btn-primary btn-sm" href="{{route('dish.edit', $dish)}}" role="button" name="submit">Update dish</button>

  </form>
</div>

@endsection
