@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h2 class="text-primary text-center">Edit User</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.user.update', $user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Enter User Name">
                </div>
                <div class="form-group mb-2">
                    <input type="text" name="email" class="form-control" value="{{$user->email}}" placeholder="Enter User email">
                </div>
                <div class="form-group mb-2">
                    <input type="password" name="password" class="form-control" placeholder="Enter User Password or don not touch to hold previous password">
                </div>
                <input type="submit" class="btn btn-primary w-100" value="Update">
            </form>            
        </div>
    </div>
</body>
@endsection