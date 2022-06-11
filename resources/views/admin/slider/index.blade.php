@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3 class="text-center text-primary">
                    Slider Images
                </h3>
            </div>
            <a href="{{route('admin.slider.create')}}" class="btn btn-primary" title="Add new Image">Upload New Image</a>
        </div>
        <div class="card-body">
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Sub-Title</th>
                        <th>Uploaded by</th>
                        <th>Uploaded at</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sliders as $key => $slider)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><img src="{{asset('images/sliders/'.$slider->image)}}" class="img-thumbnail" style="height: 8em; width: 12em" alt=""></td>
                            <td>{{$slider->title}}</td>
                            <td>{{$slider->subtitle}}</td>
                            <td>{{$slider->user->name}}</td>
                            <td>{{$slider->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('admin.slider.edit', $slider->id)}}" class="btn btn-success" title="Edit this slider">
                                    <i class="fa fa-check"></i>
                                </a>

                                <form action="{{route('admin.slider.destroy', $slider->id)}}" method="POST" style="display:inline;">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Delete this Slider">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty 
                        <tr class="table-warning text-center">
                            <td colspan="7">No Image <br></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection