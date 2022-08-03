<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\CTrip;
use App\Models\Cruise;

class CruiseBook extends Component
{
    public $trips;
    public $selected_port;
    public $strips = [];
    public $trip_id;
    public $price_per_person;
    public $no_of_person = 1;
    public $amount;
    public $user_name;
    public $email;
    public $mobile;

    public function mount(){
        $this->trips = CTrip::select('port')->distinct()->get();

        if(auth()->check()){
            $this->user_name = auth()->user()->name;
            $this->email = auth()->user()->email;
            $this->mobile = auth()->user()->mobile;
        } 
    }

    public function loadTripByPort(){
        $this->strips = CTrip::where('port', $this->selected_port)->get();
    }

    public function loadPPP(){
        $abc = CTrip::find($this->trip_id);
        $this->price_per_person = $abc->price;
        $this->calTotalAmount();
    }

    public function calTotalAmount(){
        $this->amount = $this->price_per_person * $this->no_of_person;
    }

    public function saveCruiseBook(){
        if($this->trip_id != null || $this->no_of_person != null || $this->amount != null){
            $cruise = new Cruise;
            $cruise->c_trip_id = $this->trip_id;
            $cruise->person = $this->no_of_person;
            $cruise->amount = $this->amount;
            $cruise->user_name = $this->user_name;
            $cruise->email = $this->email;
            $cruise->mobile = $this->mobile;
            $cruise->save();
            return redirect()->route('cruise.payment', $cruise->id)->with('success', 'Successfully Reserved.');

        }        
    }

    public function render()
    {
        return view('livewire.cruise-book');
    }
}
