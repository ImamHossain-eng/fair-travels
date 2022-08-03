@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Service Destination/Starting Location Create
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.service.store')}}" method="POST">
            @csrf 
            <div class="form-group mb-4">
                <input type="text" name="name" class="form-control" placeholder="Enter location name" required>
            </div>
            <div class="form-group mb-4">
                <select name="service" class="form-select">
                    <option value="">Choose Service</option>
                    <option value="Hotel">Hotel</option>
                    <option value="Transport">Transport</option>
                    <option value="Insurance">Transport</option>
                </select>
            </div>
            <input type="submit" value="Save" class="btn btn-primary w-100">
        </form>
    </div>
</div>
@endsection