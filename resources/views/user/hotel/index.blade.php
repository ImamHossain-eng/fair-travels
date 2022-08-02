@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">Hotel Booking List</h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-light">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Destination</th>
                    <th>Total Amount</th>
                    <th>Order at</th>
                    <th>Payment</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($hotels as $key => $hotel)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$hotel->destination}}</td>
                        <td>{{$hotel->amount}}</td>
                        <td>{{$hotel->created_at->diffForHumans()}}</td>
                        <td>@if($hotel->payment == false) Pending @else Confirm @endif</td>
                        <td>
                            <a href="/user/hotels/{{$hotel->id}}" title="Show this booking" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            @if($hotel->payment == false)
                            <a href="/hotels/{{$hotel->id}}/payment" title="Pay for this booking" class="btn btn-success">
                                <i class="fa fa-credit-card"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="6">You did not book any hotel till now</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection