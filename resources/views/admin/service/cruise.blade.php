@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Cruise Reservation List
            </h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Email</th>
                    <th>Person</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Payment</th>
                    <th>Reserved at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cruises as $key => $cruise)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$cruise->email}}</td>
                        <td>{{$cruise->person}}</td>
                        <td>{{$cruise->ctrip->date}}</td>
                        <td>{{number_format($cruise->amount, 2)}}</td>
                        <td>@if($cruise->payment == false) Pending @else Confirmed @endif</td>
                        <td>{{$cruise->created_at->diffForHumans()}}</td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{$cruises->links()}}
    </div>
</div>
@endsection