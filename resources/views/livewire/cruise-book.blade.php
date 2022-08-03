<div>
    <section class="p-4 bg-success">
        <div class="container m-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="text-center text-success"> <i class="fa fa-ship"></i> Cruise Reservation Service</h3>
                    </div>
                </div>
                <div class="card-body mt-4">
                    <form wire:submit.prevent="saveCruiseBook">
                        @csrf 
                        <div class="row text-center">

                            <div class="col-md-4 col-sm-6">
                                <label for="region" class="form-label">Select Port</label>
                                <select wire:model="selected_port" wire:change="loadTripByPort" class="form-select mb-4">
                                    @if(!$selected_port)
                                    <option value="">Choose Pick Up Port</option>
                                    @foreach($trips as $st)
                                        <option value="{{$st->port}}">{{$st->port}}</option>
                                    @endforeach
                                    @else 
                                    <option value="">{{$selected_port}}</option>
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <label for="date" class="form-label">Select Available Date</label>
                                <select wire:model="trip_id" wire:change="loadPPP" class="form-select mb-4">
                                    <option value="">Select Date</option>
                                    @foreach($strips as $trip)
                                        <option value="{{$trip->id}}">{{$trip->date->format('F d, Y')}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-4 col-sm-6">
                                <label for="price_per_person" class="form-label">Price Per Person</label>
                                <input type="number" wire:model="price_per_person" class="form-control" placeholder="Price Per Day" disabled>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="no_of_person" class="form-label">Price Per Person</label>
                                <input type="number" wire:model="no_of_person" wire:change="calTotalAmount" class="form-control" placeholder="No of Person">
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="amount" class="form-label">Total Amount</label>
                                <input type="number" step="any" wire:model="amount" class="form-control mb-4" placeholder="Total Amount" disabled>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="user_name" class="form-label">User Name</label>
                                <input type="text" wire:model="user_name" class="form-control mb-4" placeholder="User Name">
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" wire:model="email" class="form-control mb-4" placeholder="User Email">
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="mobile" class="form-label">Contact Number</label>
                                <input type="number" wire:model="mobile" class="form-control mb-4" placeholder="Contact Number">
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary w-50 p-3" value="Save this Booking">
                        </div>
                    </form>    
                    
                    <p></p>
                </div>
            </div>
        </div>
    </section>  
</div>


