@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Transportation Service
            </h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Vehicle</th>
                    <th>Date</th>
                    <th>No of Days</th>
                    <th>Amount</th>
                    <th>Payment</th>
                    <th>Rent at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transports as $key => $trans)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$trans->email}}</td>
                        <td>{{$trans->location}}</td>
                        <td>{{$trans->type}}</td>
                        <td>{{$trans->booking_date->format('F d, Y')}}</td>
                        <td>{{$trans->no_of_days}}</td>
                        <td>{{number_format($trans->amount, 2)}}</td>
                        <td>@if($trans->payment == false) Pending @else Confirmed @endif</td>
                        <td>{{$trans->created_at->diffForHumans()}}</td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{$transports->links()}}
    </div>
</div>
@endsection