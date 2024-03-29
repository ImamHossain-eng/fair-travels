<section>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="/">
              <img src="{{asset('images/icons/travel.png')}}" style="height: 60px;width: 60px;">
              FAIR TRAVELS & TOURS
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('homepage')) active @endif" aria-current="page" href="/">HOME</a>
              </li>  
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  BOOKINGS
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  {{-- <li>
                    <a class="dropdown-item" href="#">FLIGHT RESERVATION</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">VISA PROCESSING</a>
                  </li> --}}
                  <li>
                    <a class="dropdown-item" href="/hotel-booking">HOTEL BOOKING</a>
                  </li>
                  {{-- <li>
                    <a class="dropdown-item" href="#">PRODUCT DELIVERY</a>
                  </li> --}}
                  <li>
                    <a class="dropdown-item" href="/foreign-exchange">FOREIGN EXCHANGE</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="/cruise">CRUISE RESERVATION</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="/transportation">TRANSPORTATION</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="/insurance">INSURANCES</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('package*')) active @endif" href="/packages">PACKAGES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">ABOUT US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/pages/contact">CONTACT US</a>
              </li>
            </ul>
            <span class="navbar-text">
              <ul>
                  <li>
                    @if(auth()->check())
                      @if(auth()->user()->role == 'user')
                        <a href="/home">Dashboard</a>
                        @else 
                        <a href="/admin">Dashboard</a>
                      @endif
                    @else 
                      <a href="/login" class="p-2">Login</a>
                      <a href="/register" class="p-2">Sign Up</a>
                    @endif
                  </li>
              </ul>
            </span>
          </div>
        </div>
      </nav>
</section>