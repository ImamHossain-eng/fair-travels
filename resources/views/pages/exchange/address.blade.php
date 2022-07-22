@extends('layouts.home')
@section('content')
<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header bg-warning">
                <div class="card-title">
                    <h3 class="text-center text-dark">
                        Please Provide Your Delivery Address
                    </h3>
                </div>
            </div>
            <div class="card-body" style="background: #EBF8A4;">
                <div class="alert alert-info">Foreign Exchange Service
                    <ul>
                        <li>{{$ex->type}}</li>
                        <li>{{$ex->email}}</li>
                        <li>BDT: {{$ex->bdt_amount}}</li>
                    </ul>
                </div>
        
                <form action="{{route('foreign.exchange.address', $ex->id)}}" method="POST">
                    @csrf 
                    @method('PUT')
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <input type="text" name="street" class="form-control" placeholder="Street Address*">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="city" class="form-control" placeholder="City/State*">
                        </div>
                    </div>
    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <input type="text" name="zip" class="form-control" placeholder="Postal Code/ZIP">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="country" class="form-control" placeholder="Country*">
                        </div>
                    </div>
                    
                  
                   <input type="submit" value="Save Details" class="btn btn-primary w-100">
                </form>
            </div>
        </div>
    </div>
</body>
@endsection