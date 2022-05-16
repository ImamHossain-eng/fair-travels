@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                All Money Exchange Requests
            </h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Method</th>
                    <th>Currency</th>
                    <th>Amount</th>
                    <th>Amount (BDT)</th>
                    <th>Requested</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($requests as $req)
                    <tr>
                        <td>{{$req->mobile}}</td>
                        <td>{{$req->email}}</td>
                        <td>{{$req->type}}</td>
                        <td>{{$req->exchange->name}}({{$req->exchange->short_form}})</td>
                        <td>{{$req->amount}}</td>
                        <td>{{$req->bdt_amount}}</td>
                        <td>{{$req->created_at->diffForHumans()}}</td>
                        <td>Option</td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="8">No Request.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>        
    </div>
</div>
@endsection