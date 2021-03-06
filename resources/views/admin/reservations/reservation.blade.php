@extends('layouts.master')


@section('header')
  @section('content')


<form method="POST" action="{{ route('reservation.update', $reservation)}}">
   @csrf
   @method('PUT')
   <div class="row">
     <div class="col-md-6 form-group">
       <label for="name">First Name</label>
       <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{$reservation->name}}">
       @if ($errors->has('name'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('name') }}</strong>
           </span>
       @endif
     </div>
     <div class="col-md-6 form-group">
       <label for="surname">Last Name</label>
       <input type="text" class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}" id="surname" name="surname" value="{{$reservation->surname}}">
       @if ($errors->has('surname'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('surname') }}</strong>
           </span>
       @endif
     </div>
   </div>
   <div class="row">
     <div class="col-md-12 form-group">
       <label for="email">Email</label>
       <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{$reservation->email}}">
       @if ($errors->has('email'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('email') }}</strong>
           </span>
       @endif
     </div>
   </div>
   <div class="row">
     <div class="col-md-6 form-group">
       <label for="number_of_persons">How Many People</label>
       <select name="number_of_persons" id="number_of_persons" class="form-control {{ $errors->has('number_of_persons') ? ' is-invalid' : '' }}" >
         <option value="{{$reservation->id}}" {{$reservation->number_of_persons == $reservation->id ? 'selected' : ''}}>{{$reservation->number_of_persons}}</option>
         <option value="1">1 People</option>
         <option value="2">2 People</option>
         <option value="3">3 People</option>
         <option value="4">4+ People</option>
       </select>
       @if ($errors->has('number_of_persons'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('number_of_persons') }}</strong>
           </span>
       @endif
     </div>
     <div class="col-md-6 form-group">
       <label for="phone">Phone</label>
       <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="m_phone" name="phone" value="{{$reservation->phone}}">
       @if ($errors->has('phone'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('phone') }}</strong>
           </span>
       @endif
     </div>
   </div>

   <div class="row">
     <div class="col-md-6 form-group">
       <label for="date">Date</label>
       <input type="text" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" id="m_date" name="date" value="{{$reservation->date}}">
       @if ($errors->has('date'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('date') }}</strong>
           </span>
       @endif
     </div>
     <div class="col-md-6 form-group">
       <label for="time">Time</label>
       <input type="text" class="form-control {{ $errors->has('time') ? ' is-invalid' : '' }}" id="m_time" name="time" value="{{$reservation->time}}">
       @if ($errors->has('time'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('time') }}</strong>
           </span>
       @endif
     </div>
   </div>



  <button class="btn btn-primary btn-sm" href="#" role="button" name="submit">Update reservation</button>
</form>
</div>

@endsection
@endsection
