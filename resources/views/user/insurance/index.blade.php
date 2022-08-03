@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header bg-info">
        <div class="card-title">
            <h3 class="text-center text-dark">Insurance</h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Region</th>
                    <th>Starting Date</th>
                    <th>Ending Date</th>
                    <th>Amount</th>
                    <th>Payment</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($insurances as $key => $insurance)
                    <tr>
                        <td> {{$key+1}} </td>
                        <td> {{$insurance->region}} </td>
                        <td> {{$insurance->starting_date->format('F d, Y')}} </td>
                        <td> {{$insurance->ending_date->format('F d, Y')}} </td>
                        <td> {{number_format($insurance->amount, 2)}} </td>
                        <td>@if($insurance->payment == false) Pending @else Confirmed @endif</td>
                        <td>
                            @if($insurance->payment == false)
                            <a href="/insurance/{{$insurance->id}}/payment" title="Pay for this booking" class="btn btn-success">
                                <i class="fa fa-credit-card"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection