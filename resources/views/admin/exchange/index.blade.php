@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center text-primary">Foreign Exchange Rates</h3>
            <a href="/admin/exchange/create" title="Add New Currency to the list" class="btn btn-primary">Add New</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-light">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Currency</th>
                    <th>Short Form</th>
                    <th>Rate in BDT</th>
                    <th>Status</th>
                    <th>Inserted At</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($exchanges as $key => $exchange)
                    <tr>
                        <td> {{$key+1}} </td>
                        <td> {{$exchange->name}} </td>
                        <td> {{$exchange->short_form}} </td>
                        <td> {{$exchange->rate}} </td>
                        <td>
                            @if($exchange->status == true)
                                Active
                            @else 
                                Deactive
                            @endif
                        </td>
                        <td>{{$exchange->created_at->diffForHumans()}}</td>
                        <td>

                            <form action="{{route('admin.exchange.destroy', $exchange->id)}}" method="POST" style="display:inline;">
                                @csrf 
                                @method('PUT')
                                <button type="submit" title="Update Status" class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                </button>
                            </form>

                            <form action="{{route('admin.exchange.destroy', $exchange->id)}}" method="POST" style="display:inline;">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" title="Delete this" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="7">No Currency Inserted</td>
                    </tr>
                    
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection