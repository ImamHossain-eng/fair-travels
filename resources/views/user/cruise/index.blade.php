@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">Cruise Reservation</h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-light">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Port</th>
                    <th>Date</th>
                    <th>Person</th>
                    <th>Total Amount</th>
                    <th>Order at</th>
                    <th>Payment</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cruises as $key => $cruise)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$cruise->CTrip->port}}</td>
                        <td>{{$cruise->CTrip->date->format('F d, y')}}</td>
                        <td>{{$cruise->person}}</td>
                        <td>{{number_format($cruise->amount, 2)}}</td>
                        <td>{{$cruise->created_at->diffForHumans()}}</td>
                        <td>@if($cruise->payment == false) Pending @else Confirm @endif</td>
                        <td>
                            @if($cruise->payment == false)
                            <a href="/cruise/{{$cruise->id}}/payment" title="Pay for this booking" class="btn btn-success">
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