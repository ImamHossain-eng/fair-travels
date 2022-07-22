@extends('layouts.admin')
@section('content')
<div class="card mt-4">
    <div class="card-header bg-info">
        <div class="card-title">
            <h3 class="text-center">
                All Payments 
            </h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Email</th>
                    <th>Sender Number</th>
                    <th>Amount</th>
                    <th>Method</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $key => $payment)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$payment->email}}</td>
                        <td>{{$payment->mobile}}</td>
                        <td>{{number_format($payment->amount, 2)}} /=</td>
                        <td>{{$payment->method}}</td>
                        <td>
                            @if($payment->status == false)
                            Pending
                            @else Confirmed
                            @endif
                        </td>
                        <td>
                            @if($payment->status == false)
                                <form action="{{route('admin.payment.confirm', $payment->id)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button title="Confirm this Payment" class="btn btn-success">
                                        <i class="fa fa-credit-card"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="6">No Payments</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <br>
        {{$payments->links()}}
    </div>
</div>
@endsection