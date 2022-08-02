<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Exchange_Book;
use App\Models\Payment;
use App\Models\Hotel;
use App\Models\Transport;
use App\Models\Insurance;


class UserController extends Controller
{
    public function package_enrolled(){
        $packages = Book::where('email', auth()->user()->email)->latest()->paginate(10);
        return view('user.package.index', compact('packages'));
    }
    public function money_index(){
        $exchanges = Exchange_Book::where('email', auth()->user()->email)->latest()->paginate(10);
        return view('user.money.index', compact('exchanges'));
    }
    public function payment_index(){
        $payments = Payment::where('email', auth()->user()->email)->get();
        return view('user.payment.index', compact('payments'));
    }
    public function hotel_index(){
        $hotels = Hotel::where('email', auth()->user()->email)->latest()->get();
        return view('user.hotel.index', compact('hotels'));
    }
    public function hotel_show($id){
        $hotel = Hotel::find($id);
        return view('user.hotel.show', compact('hotel'));
    }
    public function transport_index(){
        $transports = Transport::where('email', auth()->user()->email)->get();
        return view('user.transport.index', compact('transports'));
    }
    public function insurance_index(){
        $insurances = Insurance::where('email', auth()->user()->email)->get();
        return view('user.insurance.index', compact('insurances'));
    }
    
}
