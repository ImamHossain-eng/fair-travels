@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header bg-info">
        <div class="card-title">
            <h3 class="text-center text-dark">Transportation</h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Location</th>
                    <th>By</th>
                    <th>Date</th>
                    <th>No of Days</th>
                    <th>Amount</th>
                    <th>Payment</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transports as $key => $transport)
                    <tr>
                        <td> {{$key+1}} </td>
                        <td> {{$transport->location}} </td>
                        <td> {{$transport->type}} </td>
                        <td> {{$transport->booking_date->format('F d, Y')}} </td>
                        <td> {{$transport->no_of_days}} </td>
                        <td> {{number_format($transport->amount, 2)}} </td>
                        <td>@if($transport->payment == false) Pending @else Confirmed @endif</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection