@extends('layouts.home')
@section('content')
<div class="container">
    <div class="card" style="min-height: 70vh;">
        <div class="card-header">
            <div class="card-title">
                <h3 class="text-center bg-warning p-2">
                    Package Booking
                    {{-- Booking of Package {{$package->tour_code}} --}}
                </h3>
            </div>
        </div>
        <div class="card-body">

            <form action="{{route('package.book.store')}}" method="POST">
                @csrf
                * represents mandatory fields
                <input type="hidden" name="package_id" value="{{$package->id}}">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <select name="adult" class="form-control">
                            <option value="null">Choose Number of Adults*</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="child" class="form-control">
                            <option value="null">Choose Number of Children(2-11years)...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <input type="text" name="name" @auth value="{{ auth()->user()->name }}" @endauth class="form-control" placeholder="Enter Your Name*">
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <input type="email" name="email" @auth value="{{ auth()->user()->email }}" @endauth class="form-control" placeholder="Enter Your Email*">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="mobile" @auth value="{{ auth()->user()->mobile }}" @endauth class="form-control" placeholder="Enter Your Mobile Number*">
                    </div>
                </div>

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
               <input type="submit" value="Confirm" class="btn btn-primary w-100">
    
            </form>
        </div>
    </div>
</div>
@endsection