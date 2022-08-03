@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Cruise Trips Edit
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.ctrip.update', $trip->id)}}" method="POST">
            @csrf 
            @method('PUT')
            <div class="d-md-flex justify-content-between">
                <div class="form-group w-50 m-4">
                    <label for="port">Enter Port Name</label>
                    <input type="text" name="port" value="{{$trip->port}}" placeholder="Port Name" class="form-control">
                </div>
                <div class="form-group w-50 m-4">
                    <label for="date">Current Value: {{$trip->date->format('F d, Y')}}</label>
                    <input type="date" name="date" placeholder="Date of Trip" class="form-control">
                </div>
                <div class="form-group w-50 m-4">
                    <label for="price">Price Per Person</label>
                    <input type="number" name="price" value="{{$trip->price}}" placeholder="Price per Person" class="form-control">
                </div>
            </div>
            <div class="form-group mb-4">
                <textarea name="info" class="form-control" cols="30" rows="10">{{$trip->info}}</textarea>
            </div>

            <input type="submit" class="btn btn-primary w-100 p-1" value="Update">
            
        </form>
    </div>
</div>
@endsection