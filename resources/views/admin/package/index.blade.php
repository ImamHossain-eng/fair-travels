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
                    <th>Thumbnail</th>
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
                        <td><img src="{{asset('images/packages/'.$package->image)}}" class="img-thumbnail" style="width: 100px; height: 70px;"></td>
                        <td>{{$package->tour_code}}</td>
                        <td>{{Carbon\Carbon::parse($package->date)->format('F d, Y')}}</td>
                        <td>{{number_format($package->amount, 2)}}</td>
                        <td>{{$package->country}}</td>
                        <td>{{$package->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="/admin/package/{{$package->id}}/edit" title="Edit this package" class="btn btn-success">
                                <i class="fa fa-check"></i>
                            </a>
                            <form action="{{route('admin.package.destroy', $package->id)}}" method="POST" style="display:inline;">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" title="Delete this package" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="7">No Package Yet <br><br> </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$packages->links()}}
    </div>
</div>
@endsection