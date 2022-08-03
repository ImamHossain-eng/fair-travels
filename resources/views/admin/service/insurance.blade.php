@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Insurance Service
            </h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Email</th>
                    <th>Region</th>
                    <th>Starting Date</th>
                    <th>Ending Date</th>
                    <th>Amount</th>
                    <th>Payment</th>
                    <th>Rent at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($insurances as $key => $insu)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$insu->email}}</td>
                        <td>{{$insu->region}}</td>
                        <td>{{$insu->starting_date->format('F d, Y')}}</td>
                        <td>{{$insu->ending_date->format('F d, Y')}}</td>
                        <td>{{number_format($insu->amount, 2)}}</td>
                        <td>@if($insu->payment == false) Pending @else Confirmed @endif</td>
                        <td>{{$insu->created_at->diffForHumans()}}</td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{$insurances->links()}}
    </div>
</div>
@endsection