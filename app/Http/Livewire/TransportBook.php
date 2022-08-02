<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Hotel_Destination;
use App\Models\Transport;

class TransportBook extends Component
{
    //Declare multiple variable to use
    public $locations;
    public $location;
    public $type;
    public $price_per_day;
    public $booking_date;
    public $no_of_days = 1;
    public $amount;
    public $user_name;
    public $email;
    public $mobile;

    public function mount(){
        $destinations = Hotel_Destination::where('service', 'Transport')->get();
        $this->locations = $destinations;

        if(auth()->check()){
            $this->user_name = auth()->user()->name;
            $this->email = auth()->user()->email;
            $this->mobile = auth()->user()->mobile;
        }  
    }

    public function loadPerDayPrice(){
        if($this->type == 'Car'){
            $this->price_per_day = 12000;
        }elseif($this->type == 'Bus'){
            $this->price_per_day = 25000;
        }else{
            $this->price_per_day = 0;
        }
    }

    public function loadTotalAmount(){
        $this->amount = $this->price_per_day * $this->no_of_days;
    }

    public function saveTransport(){
        $transport = new Transport;
        $transport->location = $this->location;
        $transport->type = $this->type;
        $transport->price_per_day = $this->price_per_day;
        $transport->booking_date = $this->booking_date;
        $transport->no_of_days = $this->no_of_days;
        $transport->amount = $this->amount;
        $transport->user_name = $this->user_name;
        $transport->email = $this->email;
        $transport->mobile = $this->mobile;
        $transport->save();
        return redirect()->route('transportation.payment', $transport->id)->with('success', 'Successfully Booked.');
    }


    public function render()
    {
        return view('livewire.transport-book');
    }
}
