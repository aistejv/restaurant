
@extends('layout.master')

@section('content')
  @if(session('message'))
      <div class="alert alert-success col-sm-2 my-5">
        {{session('message')}}
      </div>
  @endif
  <section class="ftco-cover" style="background-image: url(images/bg_3.jpg);" id="section-home">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center ftco-vh-80">
        <div class="col-md-12">
          <h1 class="ftco-heading ftco-animate mb-3">Welcome To Taste Restaurant</h1>
          <p><a href="https://free-template.co/" target="_blank" class="btn btn-primary btn-lg ftco-animate" data-toggle="modal" data-target="#reservationModal">Reservation</a></p>
        </div>
      </div>
    </div>
  </section>
  <!-- END section -->

  <section class="ftco-section" id="section-about">
    <div class="container">
      <div class="row">
        <div class="col-md-5 ftco-animate mb-5">
          <h4 class="ftco-sub-title">Our Story</h4>
          <h2 class="ftco-primary-title display-4">Welcome</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>

          <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          <p><a href="#" class="btn btn-secondary btn-lg">Our Story</a></p>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6 ftco-animate img" data-animate-effect="fadeInRight">
          <img src="images/about_img_1.jpg" alt="Free Template by Free-Template.co">
        </div>
      </div>
    </div>
  </section>
  <!-- END section -->


  <section class="ftco-section bg-light" id="section-offer">
    <div class="container">

      <div class="row">
        <div class="col-md-12 text-center mb-5 ftco-animate">
          <h4 class="ftco-sub-title">Our Offers</h4>
          <h2 class="display-4">Offers &amp; Promos</h2>
          <div class="row justify-content-center">
            <div class="col-md-7">
              <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="owl-carousel ftco-owl">
            @foreach($promos as $promo)
            <div class="item">
              <div class="media d-block mb-4 text-center ftco-media ftco-animate border-0">
                <img src="{{$promo->image_url}}" alt="image-url" class="img-fluid">
                <div class="media-body p-md-5 p-4">
                  <h5 class="text-primary">{{$promo->price}} &euro;</h5>
                  <h5 class="mt-0 h4">{{$promo->title}}</h5>
                  <p class="mb-4">{{$promo->description}}</p>
                  <p class="mb-0"><a href="#" class="btn btn-primary btn-sm">Order Now!</a></p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END section -->

  <section class="ftco-section" id="section-menu">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center mb-5 ftco-animate">
          <h2 class="display-4">Today's Menu</h2>
          <div class="row justify-content-center">
            <div class="col-md-7">
              <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
        </div>

        <div class="col-md-12 text-center">

          <ul class="nav ftco-tab-nav nav-pills mb-5" id="pills-tab" role="tablist">
            @foreach ($mains as $main)
            <li class="nav-item ftco-animate">
              <a class="nav-link {{$main->id == 1 ? 'active' : ''}}" id="pills-{{$main->title}}-tab" data-toggle="pill" href="#pills-{{$main->title}}" role="tab" aria-controls="pills-{{$main->title}}" aria-selected="true">{{$main->title}}</a>
            </li>
            @endforeach
            {{-- <li class="nav-item ftco-animate">
              <a class="nav-link active" id="pills-breakfast-tab" data-toggle="pill" href="#pills-breakfast" role="tab" aria-controls="pills-breakfast" aria-selected="true">Breakfast</a>
            </li>
            <li class="nav-item ftco-animate">
              <a class="nav-link" id="pills-lunch-tab" data-toggle="pill" href="#pills-lunch" role="tab" aria-controls="pills-lunch" aria-selected="false">Lunch</a>
            </li>
            <li class="nav-item ftco-animate">
              <a class="nav-link" id="pills-dinner-tab" data-toggle="pill" href="#pills-dinner" role="tab" aria-controls="pills-dinner" aria-selected="false">Dinner</a>
            </li> --}}
          </ul>

          <div class="tab-content text-left">
            @foreach($mains as $main)
            <div class="tab-pane fade {{$main->id == 1 ? 'show active' : ''}}" id="pills-{{$main->title}}" role="tabpanel" aria-labelledby="pills-{{$main->title}}-tab">
              <div class="row">
                @foreach($main->dishes as $dish)
                <div class="col-md-6 ftco-animate">
                  <div class="media menu-item">
                    <img class="mr-3" src="{{$dish->image_url}}" class="img-fluid" alt="Free Template by Free-Template.co">
                    <div class="media-body">
                      <h5 class="mt-0">{{$dish->title}}</h5>
                      <p>{{$dish->description}}.</p>
                      <h6 class="text-primary menu-price">{{$dish->price}} &euro;</h6>
                    </div>
                  </div>
                </div>
              @endforeach
              </div>
            </div>
          @endforeach
        </div>
        
      </div>
    </div>
    </div>
  </section>
  <!-- END section -->

  <section class="ftco-section bg-light" id="section-news">
    <div class="container">

      <div class="row">
        <div class="col-md-12 text-center mb-5 ftco-animate">
          <h2 class="display-4">News &amp; Events</h2>
          <div class="row justify-content-center">
            <div class="col-md-7">
              <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="media d-block mb-4 text-center ftco-media ftco-animate">
            <img src="images/offer_1.jpg" alt="Free Template by Free-Template.co" class="img-fluid">
            <div class="media-body p-md-5 p-4">
              <h5 class="mt-0 h4">In Taste Restaurant</h5>
              <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>

              <p class="mb-0"><a href="#" class="btn btn-primary btn-sm">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="media d-block mb-4 text-center ftco-media ftco-animate">
            <img src="images/offer_2.jpg" alt="Free Template by Free-Template.co" class="img-fluid">
            <div class="media-body p-md-5 p-4">
              <h5 class="mt-0 h4">Chef Special Menu</h5>
              <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>

              <p class="mb-0"><a href="#" class="btn btn-primary btn-sm">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="media d-block mb-4 text-center ftco-media ftco-animate">
            <img src="images/offer_3.jpg" alt="Free Template by Free-Template.co" class="img-fluid">
            <div class="media-body p-md-5 p-4">
              <h5 class="mt-0 h4">Merriage Celebrations</h5>
              <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>

              <p class="mb-0"><a href="#" class="btn btn-primary btn-sm">Read More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END section -->

  <section class="ftco-section" id="section-gallery">
    <div class="container">
      <div class="row ftco-custom-gutters">

        <div class="col-md-12 text-center mb-5 ftco-animate">
          <h2 class="display-4">Food Gallery</h2>
          <div class="row justify-content-center">
            <div class="col-md-7">
              <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
        </div>
        @foreach($images as $image)
        <div class="col-md-4 ftco-animate">
          <a href="#" class="ftco-thumbnail image-popup">
            <img src="{{$image->image_url}}" alt="image-url" class="img-fluid">
          </a>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  <!-- END section -->

  <section class="ftco-section bg-light" id="section-contact">
    <div class="container">
      <div class="row">

        <div class="col-md-12 text-center mb-5 ftco-animate">
          <h2 class="display-4">Contact Us</h2>
          <div class="row justify-content-center">
            <div class="col-md-7">
              <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
        </div>

        <div class="col-md mb-5 ftco-animate">
          <form action="" method="post">
            <div class="form-group">
              <label for="name" class="sr-only">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="text" class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
              <label for="message" class="sr-only">Message</label>
              <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Write your message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg" value="Send Message">
            </div>
          </form>
        </div>

      </div>
    </div>
  </section>
  <div id="map"></div>
  <!-- END section -->





        <!-- loader -->
        {{-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>

        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/jquery.timepicker.min.js"></script>

        <script src="js/jquery.animateNumber.min.js"></script>


        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="js/google-map.js"></script>

        <script src="js/main.js"></script> --}}



@endsection
@include ('modals.reservation')
