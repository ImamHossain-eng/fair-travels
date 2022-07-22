@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center text-primary">All Enrolled Packages</h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Email</th>
                    <th>Tour Code</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>People</th>
                    <th>Requested at</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($packages as $key => $package)
                    <tr @if($package->status == false) class="table-warning" @else class="table-success" @endif>
                        <td>{{$key+1}}</td>
                        <td>{{$package->email}}</td>
                        <td>{{$package->package->tour_code}}</td>
                        <td>{{Carbon\Carbon::parse($package->package->date)->format('F d, Y')}}</td>
                        <td>{{number_format($package->amount, 2)}}</td>
                        <td>{{$package->adult+$package->children}}</td>
                        <td>{{Carbon\Carbon::parse($package->created_at)->format('F d, Y')}} <br> {{$package->created_at->diffForHumans()}}</td>
                        <td>
                            @if($package->status == false)
                                Pending
                            @else 
                                Confirmed
                            @endif
                        </td>
                        <td>
                            @if($package->payment == false)
                                Pending
                            @else 
                                Confirmed
                            @endif
                        </td>
                        <td>
                            @if($package->payment == true && $package->status == false)
                                <form action="{{route('admin.enrolled.update', [$package->id])}}" method="POST" style="display:inline;">
                                    @csrf 
                                    @method('PUT')
                                    <button type="submit" title="Confirm this package" class="btn btn-success">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </form>  
                            @endif

                            

                            @if($package->payment == false)
                                <form action="{{route('admin.enrolled.destroy', $package->id)}}" method="POST" style="display:inline;">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" title="Delete this package enrolled" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="9">No Package Yet <br><br> </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$packages->links()}}
    </div>
</div>
@endsection