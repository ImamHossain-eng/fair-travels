@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center text-primary">Money Exchange Requests</h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-light">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Currency</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>BDT Amount</th>
                    <th>Requested At</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($exchanges as $key => $ex)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$ex->exchange->name}} ({{$ex->exchange->short_form}})</td>
                        <td>{{$ex->type}}</td>
                        <td>{{number_format($ex->amount, 2)}}</td>
                        <td>{{number_format($ex->bdt_amount, 2)}}</td>
                        <td>{{Carbon\Carbon::parse($ex->created_at)->format('F d, Y')}}</td>
                        <td>@if($ex->status == false) Pending @else Confirmed @endif</td>
                        <td>
                            @if($ex->status == false)
                                <a href="#" class="btn btn-success" title="Edit this Booking">
                                    <i class="fa fa-check"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty 
                    <tr class="text-center table-warning">
                        <td colspan="8">No Money Exchange Request</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>
@endsection