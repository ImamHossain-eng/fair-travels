<div>
    <section class="p-4 bg-success">
        <div class="container m-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="text-center text-success"> <i class="fa fa-subway"></i> Transportation Service</h3>
                    </div>
                </div>
                <div class="card-body mt-4">
                    <form wire:submit.prevent="saveTransport">
                        @csrf 
                        <div class="row text-center">
                            <div class="col-md-4 col-sm-6">
                                <label for="destination" class="form-label">Pick Up Location</label>
                                <select wire:model="location" class="form-select mb-4">
                                    <option value="">Choose Destination</option>
                                    @foreach($locations as $desti)
                                        <option value="{{$desti->name}}">{{$desti->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="type" class="form-label">Vehicle</label>
                                <select wire:model="type" wire:change="loadPerDayPrice" class="form-select mb-4">
                                    <option value="">Choose Vehicle</option>
                                    <option value="Car">Car -- 12000 /=</option>
                                    <option value="Bus">Bus -- 25000 /=</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="price_per_day" class="form-label">Price Per Day</label>
                                <input type="number" wire:model="price_per_day" class="form-control" placeholder="Price Per Day" disabled>
                                
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="booking_date" class="form-label">Booking Date</label>
                                <input type="date" wire:model="booking_date" class="form-control mb-4" placeholder="Select Booking Date">
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="no_of_days" class="form-label">No of Days</label>
                                <input type="number" wire:model="no_of_days" wire:change="loadTotalAmount" class="form-control mb-4" placeholder="Enter No of Days to Rent">
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
                </div>
            </div>
        </div>
    </section>  
</div>
