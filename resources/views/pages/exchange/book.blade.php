@extends('layouts.home')
@section('content')
<div class="bg-success" style="min-height: 75vh;">
    <div class="container pt-4">
        <div class="card" style="min-height: 60vh;">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="text-center text-success">
                       <i class="fa fa-exchange"></i> Foreign Exchange Service
                    </h3>
                </div>
            </div>
            <div class="scrolling bg-dark p-2 text-light" style="">
                <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="5" vspace="2px">
                    @foreach($exchanges as $ex)
                        @if($loop->first) <i class="fa fa-arrow-right"></i> @endif
                        {{$ex->name}} ({{$ex->short_form}}) <i class="fa fa-usd"></i> {{$ex->rate}}
                        @if($loop->last) <i class="fa fa-arrow-left"></i> @else | @endif
                    @endforeach
                </marquee>
            </div>
            <div class="card-body">
                <form action="{{route('foreign.exchange.store')}}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <br> <br>
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-select btn-secondary" name="type" aria-label="Default select example" value="{{old('type')}}">
                                    <option value="null">Choose Exchange Option*</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Home Delivery">Home Delivery</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select btn-secondary" name="exchange_id" aria-label="Default select example" value="{{old('exchange_id')}}">
                                    <option value="null">Choose Currency*</option>
                                    @foreach($exchanges as $ex)
                                    <option value="{{$ex->id}}">
                                        {{$ex->name}} ({{$ex->short_form}})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" step="any" value="{{old('amount')}}" name="amount" class="form-control" placeholder="$ Amount*">
                            </div>
                            <div class="col-md-3">
                                <input type="text" disabled class="form-control" placeholder="Amount in BDT">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <input type="number" value="{{old('mobile')}}" name="mobile" class="form-control" placeholder="Mobile Number*" 
                                @auth value="{{ auth()->user()->mobile }}" @endauth>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email*" 
                                @auth value="{{ auth()->user()->email }}" @endauth>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>

                    <p class="text-center">
                        <input type="submit" value="Get Quote" class="btn btn-primary btn-lg">
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection