@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Service Destination/Starting Location List
            </h3>
        </div>
        <a href="/admin/service/create" title="add new service " class="btn btn-primary">
            Add New Service Location
        </a>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>DB ID</th>
                    <th>Name</th>
                    <th>Service</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $key => $service)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$service->id}}</td>
                        <td>{{$service->name}}</td>
                        <td>{{$service->service}}</td>
                        <td>
                            <form action="{{route('admin.service.destroy', $service->id)}}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{$services->links()}}
    </div>
</div>
@endsection