@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center text-primary">Enrolled Packages</h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-light">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Tour Code</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Confirmed At</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($packages as $key => $pack)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$pack->package->tour_code}}</td>
                        <td>{{number_format($pack->amount, 2)}} /=</td>
                        <td>{{Carbon\Carbon::parse($pack->package->date)->format('F d, Y')}}</td>
                        {{-- <td>{{$pack->package->city}} <br> {{$pack->package->country}}</td> --}}
                        <td>@if($pack->status == false) Pending @else Confirmed @endif</td>
                        <td>{{Carbon\Carbon::parse($pack->created_at)->format('F d, Y - g:ia')}}</td>
                        <td>
                            @if($pack->status == false)
                                <a href="#" class="btn btn-success" title="Edit this Booking">
                                    <i class="fa fa-check"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty 
                    <tr class="text-center table-warning">
                        <td colspan="8">No Enrolled Package</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>
@endsection