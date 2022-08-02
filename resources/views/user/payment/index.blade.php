@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header bg-info">
        <div class="card-title">
            <h3 class="text-center mt-2">All Payments</h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Sender Number</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>Paid for</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $key => $payment)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$payment->mobile}}</td>
                        <td>{{$payment->method}}</td>
                        <td>{{number_format($payment->amount, 2)}} /=</td>
                        <td>{{$payment->type}}</td>
                        <td>
                            @if($payment->status == true) Confirmed
                            @else Pending
                            @endif
                        </td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="5">No Transaction</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection