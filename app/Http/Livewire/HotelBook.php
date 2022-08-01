<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Hotel_Destination;

class HotelBook extends Component
{
    public $destinations;
    public $s_destinations;
    public $amount = 0;
    public $hotel_type;
    public $room_type;
    public $s_bed = 1500;
    public $d_bed = 2500;
    public $no_of_room = 1;
    public $check_in;
    public $check_out;
    public $user_name;
    public $email;
    public $mobile;
    public $per_room_price;
    

    public function mount(){
        $getDestination = Hotel_Destination::all();
        $this->destinations = $getDestination;
            
        if(auth()->check()){
            $this->user_name = auth()->user()->name;
            $this->email = auth()->user()->email;
            $this->mobile = auth()->user()->mobile;
        }         
    }

    //onChange Functions
    public function loadRoomCost(){
        $this->room_type == 'Single-Bed' ? $this->per_room_price = 1500 : $this->per_room_price = 2500;
        $this->amount = $this->per_room_price * $this->no_of_room;
    }
    public function loadTotalAmount(){
        $this->amount = $this->per_room_price * $this->no_of_room;
    }

    public function saveHotelBooking(){
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.hotel-book');
    }
}
