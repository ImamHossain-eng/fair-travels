<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Hotel_Destination;
use App\Models\Insurance;

class InsuranceBook extends Component
{
    public $regions;
    public $region;
    public $price_per_day;
    public $starting_date;
    public $ending_date;
    public $no_of_days;
    public $amount;
    public $user_name;
    public $email;
    public $mobile;

    public function mount(){
        $destinations = Hotel_Destination::where('service', 'Insurance')->get();
        $this->regions = $destinations;

        if(auth()->check()){
            $this->user_name = auth()->user()->name;
            $this->email = auth()->user()->email;
            $this->mobile = auth()->user()->mobile;
        }  
    }

    public function loadPricePerDay(){
        if($this->region == "Inside Country"){
            $this->price_per_day = 150;
        }else{
            $this->price_per_day = 275;
        }
    }

    public function loadNoOfDays(){
        $diff = strtotime($this->starting_date) - strtotime($this->ending_date);
        $dif = abs(round($diff / 86400));
        $this->no_of_days = $dif;
        $this->loadTotalAmount();
    }

    public function loadTotalAmount(){
        $this->amount = $this->price_per_day * $this->no_of_days;
    }

    public function saveInsurance(){
        $insurance = new Insurance;
        $insurance->region = $this->region;
        $insurance->starting_date = $this->starting_date;
        $insurance->ending_date = $this->ending_date;
        $insurance->amount = $this->amount;
        $insurance->user_name = $this->user_name;
        $insurance->email = $this->email;
        $insurance->mobile = $this->mobile;
        $insurance->payment = false;
        $insurance->save();
        return redirect()->route('insurance.payment', $insurance->id)->with('success', 'Successfully Request for Insurance Service');
    }

    public function render()
    {
        return view('livewire.insurance-book');
    }
}
