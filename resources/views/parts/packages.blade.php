<section style="padding: 1em 0; background-color:rgb(55, 252, 252);">
    <h1 class="package-header"> <i class="fa fa-gift"></i> Our Packages</h1>
    <div class="container">
      <br>
        <div class="row">
          @foreach($packages as $package)
            <div class="col-lg-4 col-md-4 col-sm-6 package-item mb-2">
                <div class="card" style="width: 100%;">
                    <img src="{{asset('images/packages/'.$package->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Price: {{number_format($package->amount, 2)}} /=</h5>
                      <h6 class="card-subtitle">Code: {{$package->tour_code}}</h6>
                      <p class="card-subtitle">Date: {{\Carbon\Carbon::parse($package->date)->format('d M, Y')}}</p>
                      <hr>
                      <p class="card-text">
                          <strong>City: </strong> {{$package->city}} <br>
                          <strong>Country: </strong> {{$package->country}}
                      </p>
                      <a href="/packages/{{$package->tour_code}}" class="btn btn-primary">Show Details</a>
                    </div>
                  </div>
            </div>
            @endforeach

            

        </div>
    </div>
    <br>
</section>