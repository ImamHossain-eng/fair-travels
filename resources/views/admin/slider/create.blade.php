@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3 class="text-center text-primary">
                    Adding new Image to Slider
                </h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group mb-4">
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Title....">
                </div>
                <div class="form-group mb-4">
                    <input type="text" name="subtitle" value="{{old('subtitle')}}" class="form-control" placeholder="Sub Title....">
                </div>
                <div class="form-group mb-4">
                    <input type="file" name="image" class="form-control">
                </div>
                <input type="submit" value="Save" class="btn btn-primary w-100">
            </form>           
        </div>
    </div>
</body>
@endsection