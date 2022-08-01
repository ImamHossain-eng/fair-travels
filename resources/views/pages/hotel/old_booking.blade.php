@extends('layouts.home')
@section('content')
<head>

</head>
<body>
    <section class="p-4 bg-success">
        <div class="container m-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="text-center text-success"> <i class="fa fa-bed"></i> Hotel Booking</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="#">
                        @csrf 
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <label for="destination" class="form-label">Destination</label>
                                <select name="destination" class="form-select mb-4">
                                    <option value="">Choose Destination</option>
                                    @foreach($destinations as $desti)
                                        <option value="{{$desti->name}}">{{$desti->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="hotel_type" class="form-label">Hotel</label>
                                <select name="hotel_type" class="form-select mb-4">
                                    <option value="">Choose Hotel Type</option>
                                    <option value="Classic">Classic</option>
                                    <option value="Three-Star">Three Star</option>
                                    <option value="Five-Star">Five Star</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="room_type" class="form-label">Room</label>
                                <select name="room_type" class="form-select mb-4">
                                    <option value="">Choose Room Type</option>
                                    <option value="Single-Bed">Single-Bed : 1500 /=</option>
                                    <option value="Double-Bed">Double-Bed: 2500 /=</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="no_of_room" class="form-label">Number of Rooms</label>
                                <select name="no_of_room" class="form-select mb-4">
                                    <option value="1">Choose Number of Rooms</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Four</option>
                                    <option value="5">Five</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="check_in" class="form-label">Check-In Date</label>
                                <input type="date" name="check_in" class="form-control mb-4" placeholder="Select Check in Date">
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="check_out" class="form-label">Check-Out Date</label>
                                <input type="date" name="check_out" class="form-control mb-4" placeholder="Select Check out Date">
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary w-50 p-3" value="Save this Booking">
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </section>    
</body>
@endsection