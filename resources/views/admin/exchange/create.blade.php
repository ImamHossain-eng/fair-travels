@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">Add New Currency</h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.exchange.store')}}" method="POST">
            @csrf
            <div class="form-group mb-4">
                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Currency Name">
            </div>
            <div class="form-group mb-4">
                <input type="text" name="short_form" class="form-control" value="{{old('short_form')}}" placeholder="Enter Currency Short Form">
            </div>
            <div class="form-group mb-4">
                <input type="text" name="rate" class="form-control" value="{{old('rate')}}" placeholder="Enter Currency Rate in BDT">
            </div>
            <input type="submit" value="Save" class="btn btn-primary w-100">
        </form>
    </div>
</div>
@endsection