<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-primary" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{route('welcome')}}">Taste</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="{{route('welcome')}}" class="nav-link">About</a></li>
        <li class="nav-item active"><a href="{{route('all.dishes')}}" class="nav-link">Dishes</a></li>
        <li class="nav-item"><a href="#section-offer" class="nav-link">Offer</a></li>
        <li class="nav-item"><a href="#section-menu" class="nav-link">Menu</a></li>
        <li class="nav-item"><a href="#section-news" class="nav-link">News</a></li>
        <li class="nav-item"><a href="#section-gallery" class="nav-link">Gallery</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Contacts</a></li>
        <li class="nav-item"><a href="{{route('showCart')}}" class="nav-link">CART <span id="incart">{{$totalItems}}</span></a></li>
        <li class="nav-item"><a href="{{route('show.cart')}}" class="nav-link"> <i class="fas fa-shopping-basket"></i> Shopping Cart  <span id="totalquantity" class="badge badge-light">
          @if(Session::has('cart'))
            {{Session::get('cart')->totalQuantity}}
          @else 0
          @endif</span></a></li>

        <a href="{{route('users.profile')}}" class="nav-link dropdown-toggle">Profile</a>

        <!-- Authentication Links -->
        @guest
            <li class="nav-item" ><a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a></li>
            <li class="nav-item" ><a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a></li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
<!-- END nav -->
