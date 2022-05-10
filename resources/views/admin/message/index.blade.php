@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h2 class="text-primary text-center">All Messages</h2>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="table-info">
                        <th>Serial</th>
                        <th>Sender Name</th>
                        <th>Sender Email</th>
                        <th>Received</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $key => $message)
                        <tr @if($message->status == false) class="table-warning" @endif>
                            <td> {{ $key+1 }} </td>
                            <td> {{$message->name}} </td>
                            <td> {{$message->email}} </td>
                            <td> {{$message->created_at->diffForHumans()}} </td>
                            <td>
                                @if($message->status == false)
                                    Unseen
                                @else 
                                    Seen
                                @endif

                            </td>
                            <td>
                                <a href="/admin/message/{{$message->id}}" title="Show this message" class="btn btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        
                    @empty
                        <tr class="table-warning text-center">
                            <td colspan="6">No Message</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <br>
            {{$messages->links()}}
        </div>
    </div>
</body>
@endsection