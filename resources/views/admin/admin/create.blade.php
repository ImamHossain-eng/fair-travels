@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h2 class="text-center text-primary">Create New Admin</h2>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.admin.store')}}" method="POST">
            @csrf 
            <div class="form-group mb-2">
                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Name">
            </div>
            <div class="form-group mb-2">
                <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter Email">
            </div>
            <div class="form-group mb-2">
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group mb-2">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
            </div>
            <input type="submit" value="Save" class="btn btn-primary w-100">
        </form>
    </div>
</div>
@endsection