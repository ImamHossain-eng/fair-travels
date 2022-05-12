@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center text-primary">All Packages</h3>
        </div>
        <a href="/admin/package/create" title="Add new package" class="btn btn-primary">
            Add New Package
        </a>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Tour Code</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Country</th>
                    <th>Created at</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($packages as $key => $package)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$package->tour_code}}</td>
                        <td>{{$package->date}}</td>
                        <td>{{$package->amount}}</td>
                        <td>{{$package->country}}</td>
                        <td>{{$package->created_at->diffForHumans()}}</td>
                        <td>Option</td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="7">No Package Yet <br><br> </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection