@extends('layouts.home')
@section('content')
<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header bg-warning">
                <div class="card-title">
                    <h3 class="text-center text-dark">
                        Payment for Cruise Reservation Service
                    </h3>
                </div>
            </div>
            <div class="card-body" style="background: #EBF8A4;">
                <div class="alert alert-info">Send Money to the Following Numbers then submit this payment form:
                    <ul>
                        <li>01727084278 : Bkash | Upay | Cellfin </li>
                        <li>01727084279 : Rocket | Nagad</li>
                    </ul>
                </div>
        
                <form action="{{route('cruise.payment.store', $cruise->id)}}" method="POST">
                    @csrf 
                    <div class="form-group mb-4">
                        <input type="number" name="mobile" class="form-control" placeholder="Enter sender mobile number" value="{{old('mobile')}}">
                    </div>
                    <div class="form-group mb-4">
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" value="{{old('email')}}">
                    </div>
                    <div class="form-group mb-4">
                        <input type="text" name="transaction_id" class="form-control" placeholder="Enter Transaction ID" value="{{old('transaction_id')}}">
                    </div>
                    <div class="form-group mb-4">
                        <input type="hidden" step="any" name="amount" class="form-control" placeholder="Enter Amount" value="{{$cruise->amount}}">
                        
                        <input type="number" step="any" name="amountView" class="form-control" placeholder="Enter Amount" value="{{$cruise->amount}}" disabled>
                    </div>
                    <div class="form-group mb-4">
                        <label for="method">Select Payment Method</label>
                        <select name="method" class="form-control">
                            <option value="">Choose Payment Mobile Banking</option>
                            <option value="Bkash">Bkash</option>
                            <option value="Nagad">Nagad</option>
                            <option value="Rocket">Rocket</option>
                            <option value="Upay">Upay</option>
                            <option value="Selfin">Selfin</option>
                        </select>
                    </div>
                   <input type="submit" value="Submit" class="btn btn-primary w-100">
                </form>
            </div>
        </div>
    </div>
</body>
@endsection