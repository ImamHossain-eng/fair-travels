<ul>

    <li class="nav-item">
        <a href="{{ route('homepage') }}">
              <span class="icon">
                  <i class="fa fa-home"></i>
              </span>
            <span class="text">Homepage</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('admin')) active @endif">
        <a href="{{ route('admin') }}">
              <span class="icon">
                <svg width="22" height="22" viewBox="0 0 22 22">
                  <path
                          d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z"
                  />
                </svg>
              </span>
            <span class="text">{{ __('Dashboard') }}</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('admin.admin*')) active @endif">
        <a href="{{ route('admin.admin.index') }}">
            <span class="icon">
                <i class="fa fa-user"></i>
            </span>
            <span class="text">Admin</span>
        </a>
    </li>
    

    <li class="nav-item @if(request()->routeIs('admin.user*')) active @endif">
        <a href="{{ route('admin.user.index') }}">
            <span class="icon">
                <i class="fa fa-users"></i>
            </span>
            <span class="text">Users</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('admin.package*')) active @endif">
        <a href="{{ route('admin.package.index') }}">
            <span class="icon">
                <i class="fa fa-shopping-bag"></i>
            </span>
            <span class="text">Packages</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('admin.ctrip*')) active @endif">
        <a href="{{ route('admin.ctrip.index') }}">
            <span class="icon">
                <i class="fa fa-ship"></i>
            </span>
            <span class="text">Cruise Trip</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('admin.service*')) active @endif">
        <a href="{{ route('admin.service.index') }}">
            <span class="icon">
                <i class="fa fa-map"></i>
            </span>
            <span class="text">Service Location</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('admin.slider*')) active @endif">
        <a href="{{ route('admin.slider.index') }}">
            <span class="icon">
                <i class="fa fa-picture-o"></i>
            </span>
            <span class="text">Sliders</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('admin.enrolled*')) active @endif">
        <a href="{{ route('admin.enrolled.package') }}">
            <span class="icon">
                <i class="fa fa-get-pocket"></i>
            </span>
            <span class="text">Enrolled Packages</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('admin.payment*')) active @endif">
        <a href="{{ route('admin.payment.index') }}">
            <span class="icon">
                <i class="fa fa-credit-card"></i>
            </span>
            <span class="text">Payments</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('admin.exchange*')) active @endif">
        <a href="{{ route('admin.exchange.index') }}">
            <span class="icon">
                <i class="fa fa-money"></i>
            </span>
            <span class="text">Foreign Exchange</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('admin.money*')) active @endif">
        <a href="{{ route('admin.money.index') }}">
            <span class="icon">
                <i class="fa fa-money"></i>
            </span>
            <span class="text">Exchange Request</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('admin.hotel*')) active @endif">
        <a href="{{ route('admin.hotel.index') }}">
            <span class="icon">
                <i class="fa fa-bed"></i>
            </span>
            <span class="text">Hotel Booking</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('admin.cruise*')) active @endif">
        <a href="{{ route('admin.cruise.index') }}">
            <span class="icon">
                <i class="fa fa-ship"></i>
            </span>
            <span class="text">Cruise Reservation</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('admin.transport*')) active @endif">
        <a href="{{ route('admin.transport.index') }}">
            <span class="icon">
                <i class="fa fa-bus"></i>
            </span>
            <span class="text">Transportation</span>
        </a>
    </li>

    <li class="nav-item @if(request()->routeIs('admin.insurance*')) active @endif">
        <a href="{{ route('admin.insurance.index') }}">
            <span class="icon">
                <i class="fa fa-credit-card"></i>
            </span>
            <span class="text">Insurance Service</span>
        </a>
    </li>


  

    <li class="nav-item @if(request()->routeIs('admin.message*')) active @endif">
        <a href="{{ route('admin.message.index') }}">
            <span class="icon">
                <svg width="22" height="22" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
            </span>
            <span class="text">Messages</span>
        </a>
    </li>

    {{-- <li class="nav-item nav-item-has-children">
        <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_1"
           aria-controls="ddmenu_1" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M12.8334 1.83325H5.50008C5.01385 1.83325 4.54754 2.02641 4.20372 2.37022C3.8599 2.71404 3.66675 3.18036 3.66675 3.66659V18.3333C3.66675 18.8195 3.8599 19.2858 4.20372 19.6296C4.54754 19.9734 5.01385 20.1666 5.50008 20.1666H16.5001C16.9863 20.1666 17.4526 19.9734 17.7964 19.6296C18.1403 19.2858 18.3334 18.8195 18.3334 18.3333V7.33325L12.8334 1.83325ZM16.5001 18.3333H5.50008V3.66659H11.9167V8.24992H16.5001V18.3333Z">
                    </path>
                </svg>
            </span>
            <span class="text">Two-level menu</span>
        </a>
        <ul id="ddmenu_1" class="dropdown-nav collapse" style="">
            <li>
                <a href="#">Child menu</a>
            </li>
        </ul>
    </li> --}}
</ul>