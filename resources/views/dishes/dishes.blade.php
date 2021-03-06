@extends('layout.master')

@section('content')
  @if(session('success'))
      <div class="alert alert-success col-sm-2 my-5">
        {{session('success')}}
      </div>
  @endif

  <section class="ftco-section" id="section-menu">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center mb-5 ftco-animate">
          <h2 class="display-4">All of our dishes</h2>
        </div>

        {{-- Add a dish button --}}
        {{-- <div class="row">
          <div class="col-md-2">
            <p class="mb-0"><a href="{{route('add.dish')}}" class="btn btn-primary btn-sm">Add a dish</a></p>
          </div>
        </div> --}}

        <div class="col-md-12 text-center">

          <ul class="nav ftco-tab-nav nav-pills mb-5" id="pills-tab" role="tablist">
            <li class="nav-item ftco-animate">
              <a class="nav-link active" id="pills-breakfast-tab" data-toggle="pill" href="#pills-breakfast" role="tab" aria-controls="pills-breakfast" aria-selected="true">Appetizers</a>
            </li>
            <li class="nav-item ftco-animate">
              <a class="nav-link" id="pills-lunch-tab" data-toggle="pill" href="#pills-lunch" role="tab" aria-controls="pills-lunch" aria-selected="false">Soups</a>
            </li>
            <li class="nav-item ftco-animate">
              <a class="nav-link" id="pills-dinner-tab" data-toggle="pill" href="#pills-dinner" role="tab" aria-controls="pills-dinner" aria-selected="false">Salads</a>
            </li>
            <li class="nav-item ftco-animate">
              <a class="nav-link" id="pills-dinner-tab" data-toggle="pill" href="#pills-dinner" role="tab" aria-controls="pills-dinner" aria-selected="false">Fish</a>
            </li>
            <li class="nav-item ftco-animate">
              <a class="nav-link" id="pills-dinner-tab" data-toggle="pill" href="#pills-dinner" role="tab" aria-controls="pills-dinner" aria-selected="false">Desserts</a>
            </li>
            <li class="nav-item ftco-animate">
              <a class="nav-link" id="pills-dinner-tab" data-toggle="pill" href="#pills-dinner" role="tab" aria-controls="pills-dinner" aria-selected="false">Drinks</a>
            </li>
          </ul>

          <div class="tab-content text-left">
            <div class="tab-pane fade show active" id="pills-breakfast" role="tabpanel" aria-labelledby="pills-breakfast-tab">
              <div class="row">
                @foreach($dishes as $dish)
                <div class="col-md-6 ftco-animate">
                  <div class="media menu-item">
                    <img class="mr-3" src="{{$dish->image_url}}" class="img-fluid" alt="image">
                    <div class="media-body">
                      <h5 class="mt-0">{{$dish->title}}</h5>
                      <p>{{$dish->description}}</p>
                      <h6 class="text-primary menu-price">{{$dish->price}} &euro;</h6>
                      {{-- <form method="post" action="{{route('add.cart')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$dish->id}}">
                      <button type="submit" class="btn btn-primary btn-sm">Add to cart</button>
                      </form> --}}
                      <button  data-id="{{$dish->id}}" class="cart btn btn-primary btn-sm btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button>

                      <a data-dish="{{$dish->id}}" class="btn btn-secondary btn-sm btn-to-cart" href="{{route('addToCart', $dish->id)}}">Add to cart</a>


                    </div>
                  </div>
                </div>
              @endforeach
              </div>
            </div>
          </div>

        </div>
      </div>

      <script
      src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous"></script>
      <script type="text/javascript">
      $(document).ready(function () {
        $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $('button.cart').click(function () {
          var dish_id = $(this).data('id');
          var url = "/shoppingcart";
          console.log(dish_id);

          $.ajax({
            type:'Post',
            url: url,
            data: {id:dish_id},
            dataType:'json',

            success: function (data) {
              console.log(data);
              $('#totalquantity').html(data.totalQuantity);
            },

            error: function (data){
              console.log('Error:', data);
            }
          });
        });
      });
      </script>
    </section>

@endsection
