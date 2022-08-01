<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Hotel_Destination;
use App\Models\Hotel;

class HotelBook extends Component
{
    public $destinations;
    public $s_destinations;
    public $amount = 0;
    public $hotel_type;
    public $room_type;
    public $no_of_room = 1;
    public $check_in;
    public $check_out;
    public $day_diff;
    public $day_count = 1;
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
        // $this->amount = $this->per_room_price * $this->no_of_room;
        $this->loadTotalAmount();
    }
    public function loadDayCount(){
        $diff = strtotime($this->check_out) - strtotime($this->check_in);
        $dif = abs(round($diff / 86400));
        $this->day_count = $dif;
        $this->loadTotalAmount();
    }
    public function loadTotalAmount(){
        $this->amount = $this->per_room_price * $this->no_of_room * $this->day_count;
    }

    public function saveHotelBooking(){
        if($this->s_destinations != null || $this->hotel_type != null || $this->room_type != null){
            $hotel = new Hotel;
            $hotel->destination = $this->s_destinations;
            $hotel->hotel_type = $this->hotel_type;
            $hotel->room_type = $this->room_type;
            $hotel->price_per_room = $this->per_room_price;
            $hotel->no_of_room = $this->no_of_room;
            $hotel->check_in = $this->check_in;
            $hotel->check_out = $this->check_out;
            $hotel->amount = $this->amount;
            $hotel->user_name = $this->user_name;
            $hotel->email = $this->email;
            $hotel->mobile = $this->mobile;
            $hotel->payment = false;
            $hotel->save();
            return redirect()->route('homepage')->with('success', 'Successfully Booked');
        }else{
            return back()->with('error', 'Please try again');
        }
        
    }

    public function render()
    {
        return view('livewire.hotel-book');
    }
}
