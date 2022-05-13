@extends('layouts.home')
@section('content')
<body>
    <div class="container mb-2 mt-4" style="min-height: 70vh;">
        <div class="row wrap">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="card bg-warning sidebar">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fa fa-usd"></i> {{number_format($package->amount, 2)}} /= (Per Person)
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <i class="fa fa-bandcamp"></i> <strong>Tour Code:</strong> {{$package->tour_code}} <br>
                            <i class="fa fa-calendar"></i> <strong>Date:</strong> {{\Carbon\Carbon::parse($package->date)->format('F d, Y')}} <hr>

                            <i class="fa fa-arrow-right"></i> <strong>Type:</strong> {{$package->type}} <br>
                            <i class="fa fa-arrow-right"></i> <strong>Country:</strong> {{$package->country}} <br>
                            <i class="fa fa-arrow-right"></i> <strong>City Covered:</strong> {{$package->city}} <br>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="/package/{{$package->tour_code}}/book" class="btn btn-success w-100">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6">
                <img src="{{asset('images/packages/'.$package->image)}}" alt="" class="w-100 img-thumbnail">
                <br>
                <button class="btn btn-primary mt-3 mb-2" onclick="showDesc()">See More...</button>
                <div id="myDescription" style="display: none;">
                    {!!$package->description!!}
                </div>
            </div>
        </div>
    </div>
</body>
@endsection