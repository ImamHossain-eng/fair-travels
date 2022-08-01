<div>
    <section class="p-4 bg-success">
        <div class="container m-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="text-center text-success"> <i class="fa fa-bed"></i> Hotel Booking</h3>
                    </div>
                </div>
                <div class="card-body mt-4">
                    <form wire:submit.prevent="saveHotelBooking">
                        @csrf 
                        <div class="row text-center">
                            <div class="col-md-4 col-sm-6">
                                <label for="destination" class="form-label">Destination</label>
                                <select wire:model="s_destinations" class="form-select mb-4">
                                    <option value="">Choose Destination</option>
                                    @foreach($destinations as $desti)
                                        <option value="{{$desti->name}}">{{$desti->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="hotel_type" class="form-label">Hotel</label>
                                <select wire:model="hotel_type" class="form-select mb-4">
                                    <option value="">Choose Hotel Type</option>
                                    <option value="Classic">Classic</option>
                                    <option value="Three-Star">Three Star</option>
                                    <option value="Five-Star">Five Star</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="room_type" class="form-label">Room</label>
                                <select wire:model="room_type" wire:change="loadRoomCost" class="form-select mb-4">
                                    <option value="">Choose Room Type</option>
                                    <option value="Single-Bed">Single-Bed : 1500 /=</option>
                                    <option value="Double-Bed">Double-Bed: 2500 /=</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="per_room_price" class="form-label">Room Cost</label>
                                <input type="number" wire:model="per_room_price" class="form-control" placeholder="Per Room Price" disabled>
                                
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="no_of_room" class="form-label">Number of Rooms</label>
                                <select wire:model="no_of_room" wire:change="loadTotalAmount" class="form-select mb-4">
                                    <option value="">Choose Number of Rooms</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Four</option>
                                    <option value="5">Five</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="check_in" class="form-label">Check-In Date</label>
                                <input type="date" wire:model="check_in" class="form-control mb-4" placeholder="Select Check in Date">
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="check_out" class="form-label">Check-Out Date</label>
                                <input type="date" wire:model="check_out" wire:change="loadDayCount" class="form-control mb-4" placeholder="Select Check out Date">
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
