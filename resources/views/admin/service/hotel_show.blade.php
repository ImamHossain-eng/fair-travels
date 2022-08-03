@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">Hotel Booking Details</h3>
        </div>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                <strong>Destination: </strong> {{$hotel->destination}}
            </li>
            <li class="list-group-item">
                <strong>Hotel Type: </strong> {{$hotel->hotel_type}}
            </li>
            <li class="list-group-item">
                <strong>Room Type: </strong> {{$hotel->room_type}}
            </li>
            <li class="list-group-item">
                <strong>Price Per Room: </strong> BDT {{number_format($hotel->price_per_room, 2)}} /=
            </li>
            <li class="list-group-item">
                <strong>No of Room: </strong> {{$hotel->no_of_room}}
            </li>
            <li class="list-group-item">
                <strong>Check-In: </strong> {{$hotel->check_in->format('F d, Y')}}
            </li>
            <li class="list-group-item">
                <strong>Check-Out: </strong> {{$hotel->check_out->format('F d, Y')}}
            </li>
            <li class="list-group-item">
                <strong>Total Amount: </strong> BDT {{number_format($hotel->amount, 2)}} /=
            </li>
            <li class="list-group-item">
                <strong>User Name: </strong> {{$hotel->user_name}}
            </li>
            <li class="list-group-item">
                <strong>email: </strong> {{$hotel->email}}
            </li>
            <li class="list-group-item">
                <strong>Contact No: </strong> {{$hotel->mobile}}
            </li>
            <li class="list-group-item">
                <strong>Payment Status: </strong> @if($hotel->payment == false) Pending @else Confirm @endif
            </li>
            <li class="list-group-item">
                <strong>Ordered at:</strong> {{$hotel->created_at->diffForHumans()}}
            </li>

        </ul>
    </div>
</div>
@endsection