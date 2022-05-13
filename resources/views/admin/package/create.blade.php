@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center text-primary">Create a new tour package</h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.package.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="tour_code" value="{{old('tour_code')}}" placeholder="Enter Tour Code">
            </div>
            <div class="form-group mb-2">
                <input type="date" class="form-control" name="date" value="{{old('date')}}">
            </div>
            <div class="form-group mb-2">
                <input type="number" class="form-control" name="amount" value="{{old('amount')}}" placeholder="Enter Tour Price per Person">
            </div>
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="country" value="{{old('country')}}" placeholder="Enter Tour Country">
            </div>
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="city" value="{{old('city')}}" placeholder="Enter Tour City">
            </div>
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="type" value="{{old('type')}}" placeholder="Enter Tour Type">
            </div>
            <div class="form-group mb-2">
                <input type="file" name="image" class="form-control" value="{{old('image')}}">
            </div>
            <div class="form-group mb-2">
                <textarea name="description" class="form-control" value="{{old('description')}}" placeholder="Enter package Description"></textarea>
            </div>
            <input type="submit" value="Save" class="btn btn-primary w-100">
        </form>
    </div>
</div>
@endsection
