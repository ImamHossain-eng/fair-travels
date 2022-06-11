@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3 class="text-center text-primary">
                    Edit Slider Image
                </h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                <div class="form-group mb-4">
                    <input type="text" name="title" value="{{$slider->title}}" class="form-control" placeholder="Title....">
                </div>
                <div class="form-group mb-4">
                    <input type="text" name="subtitle" value="{{$slider->subtitle}}" class="form-control" placeholder="Sub Title....">
                </div>
                <div class="form-group mb-4">
                    <input type="file" name="image" class="form-control">
                </div>
                <input type="submit" value="Update" class="btn btn-primary w-100">
            </form>           
        </div>
    </div>
</body>
@endsection