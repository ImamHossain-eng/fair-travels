<section style="padding: 1em 0; background-color: aquamarine;">
    <h1 class="service-header mb-2" onclick="showService();" style="cursor: pointer;"> <i class="fa fa-server"></i> Individual bookings</h1>
    {{-- <p class="text-center"><button class="btn btn-primary btn-lg">See All Services</button></p> --}}
    <div class="container" id="serviceID" style="display: none;">
      <br>
        <div class="row">
            {{-- <div class="col-lg-4 col-md-4 col-sm-6 service-img">
                <div class="icon">
                    <i class="fa fa-fighter-jet fa-4x"></i>
                </div>
                <h3>FLIGHT RESERVATION</h3>
                
            </div> --}}
            {{-- <div class="col-lg-4 col-md-4 col-sm-6 service-img">
                <div class="icon">
                    <i class="fa fa-cc-visa fa-4x"></i>
                </div>
                <h3>Visa Processing</h3>
                
            </div> --}}
            <div class="col-lg-4 col-md-4 col-sm-6 service-img">
                <a href="/foreign-exchange" class="text-dark" class="serviceBtn">
                    <div class="icon">
                        <i class="fa fa-exchange fa-4x"></i>
                    </div>
                </a>
                <h3>Foreign Exchange</h3>       
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 service-img">
                <a href="/hotel-booking" class="text-dark" class="serviceBtn">
                    <div class="icon">
                        <i class="fa fa-bed fa-4x"></i>
                    </div>
                </a>
                <h3>Hotel Booking</h3>
                
            </div>            

            <div class="col-lg-4 col-md-4 col-sm-6 service-img">
                <a href="/cruise" class="text-dark" class="serviceBtn">
                    <div class="icon">
                        <i class="fa fa-ship fa-4x"></i>
                    </div>
                </a>
                <h3>Cruise Reservation</h3>       
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 service-img">
                <a href="/transportation" class="text-dark" class="serviceBtn">
                    <div class="icon">
                        <i class="fa fa-subway fa-4x"></i>
                    </div>
                </a>
                <h3>Transportation</h3>       
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 service-img">
                <a href="/insurance" class="text-dark" class="serviceBtn">
                    <div class="icon">
                        <i class="fa fa-credit-card fa-4x"></i>
                    </div>
                </a>
                <h3>Insurances </h3>       
            </div>

        </div>
    </div>
    <br>
</section>