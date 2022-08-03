@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Hotel Booking List
            </h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Destination</th>
                    <th>Room Type</th>
                    <th>No of Room</th>
                    <th>Amount</th>
                    <th>Email</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $key => $hotel)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$hotel->destination}}</td>
                        <td>{{$hotel->room_type}}</td>
                        <td>{{$hotel->no_of_room}}</td>
                        <td>{{number_format($hotel->amount, 2)}}</td>
                        <td>{{$hotel->email}}</td>
                        <td>Option</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection