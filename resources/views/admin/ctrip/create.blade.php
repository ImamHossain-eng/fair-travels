@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Cruise Trips Create
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.ctrip.store')}}" method="POST">
            @csrf 
            <div class="d-md-flex justify-content-between">
                <div class="form-group w-50 m-4">
                    <label for="port">Enter Port Name</label>
                    <input type="text" name="port" placeholder="Port Name" class="form-control">
                </div>
                <div class="form-group w-50 m-4">
                    <label for="date">Enter Trip Date</label>
                    <input type="date" name="date" placeholder="Date of Trip" class="form-control">
                </div>
                <div class="form-group w-50 m-4">
                    <label for="price">Price Per Person</label>
                    <input type="number" name="price" placeholder="Price per Person" class="form-control">
                </div>
            </div>
            <div class="form-group mb-4">
                <textarea name="info" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <input type="submit" class="btn btn-primary w-100 p-1" value="Save">
            
        </form>
    </div>
</div>
@endsection