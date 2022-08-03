@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Cruise Trips
            </h3>
        </div>
        <a href="/admin/ctrip/create" class="btn btn-primary">Add New Trip Info</a>
    </div>
    <div class="card-body">
        <table class="table table-hover table-light">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Port</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ctrips as $key => $ctrip)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$ctrip->port}}</td>
                        <td>{{$ctrip->date->format('F d, Y')}}</td>
                        <td>{{number_format($ctrip->price, 2)}}</td>
                        <td>
                            <a href="/admin/ctrip/{{$ctrip->id}}/edit" class="btn btn-success" title="Edit this Trip">
                                <i class="fa fa-check"></i>
                            </a>
                            <form action="{{route('admin.ctrip.delete', $ctrip->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="5">No Cruise Trip Found <br> <br></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection