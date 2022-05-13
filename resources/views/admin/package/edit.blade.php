@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center text-primary">Edit an Existing Package</h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.package.update', $package->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="tour_code" value="{{$package->tour_code}}" placeholder="Enter Tour Code">
            </div>
            <div class="form-group mb-2">
                <input type="date" class="form-control" name="date" value="{{$package->date}}">
            </div>
            <div class="form-group mb-2">
                <input type="number" class="form-control" name="amount" value="{{$package->amount}}" placeholder="Enter Tour Price per Person">
            </div>
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="country" value="{{$package->country}}" placeholder="Enter Tour Country">
            </div>
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="city" value="{{$package->city}}" placeholder="Enter Tour City">
            </div>
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="type" value="{{$package->type}}" placeholder="Enter Tour Type">
            </div>
            <div class="form-group mb-2">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group mb-2">
                <textarea name="description" class="form-control" placeholder="Enter package Description">{{$package->description}}</textarea>
            </div>
            <input type="submit" value="Update" class="btn btn-primary w-100">
        </form>
    </div>
</div>
@endsection
