@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h2 class="text-primary text-center">Message from {{$message->name}}</h2>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        <strong>Sender Name:</strong> {{$message->name}} <br>
                        <strong>Sender Email:</strong> {{$message->email}} <br>
                        <strong>Message Status:</strong>
                        @if($message->status == false)
                                    Unseen
                                @else 
                                    Seen
                                @endif
                        <br>
                        <strong>Received:</strong> {{ date('F d, Y(D)', strtotime($message->created_at))}} at {{ date('g:ia', strtotime($message->created_at))}} <br>
                        <strong>Seen:</strong> 
                        @if($message->status != false)
                        {{ date('F d, Y(D)', strtotime($message->updated_at))}} at {{ date('g:ia', strtotime($message->updated_at))}} 
                        @endif
                        <br>

                    </p>
                </div>
                <div class="col-md-6">
                    {{$message->body}}                    
                </div>
            </div>            
        </div>
    </div>
</body>
@endsection