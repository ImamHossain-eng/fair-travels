@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h2 class="text-primary text-center">All Users</h2>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="table-info">
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $key => $user)
                        <tr>
                            <td> {{ $key+1 }} </td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                            <td> {{ $user->created_at->diffForHumans() }} </td>
                            <td>
                                <a href="/admin/user/{{$user->id}}/edit" class="btn btn-success" title="Edit this user">
                                    <i class="fa fa-check"></i>
                                </a>
                                <form action="{{route('admin.user.destroy', $user->id)}}" method="POST" style="display:inline;">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="table-warning text-center">
                            <td colspan="5">No Users</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <br>
            {{$users->links()}}
        </div>
    </div>
</body>
@endsection