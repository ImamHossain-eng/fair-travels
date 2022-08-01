<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\Package;
use App\Models\Book;
use App\Models\Exchange;
use App\Models\Exchange_Book;
use App\Models\Slider;
use App\Models\Payment;
use App\Models\Hotel;
use App\Models\Hotel_Destination;

class PagesController extends Controller
{
    
    public function homepage(){
        $packages = Package::latest()->take(3)->get();
        $exchanges = Exchange::where('status', true)->get();
        $sliders = Slider::latest()->get();
        return view('pages.HomePage', compact('packages', 'exchanges', 'sliders'));
    }
    public function pageByName($name){
        return view('pages.static.'.$name);
    }
    public function package_list(){
        $packages = Package::latest()->paginate(6);
        return view('pages.package.list', compact('packages'));
    }
    public function contact(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'max:191'],
            'mobile' => ['required', 'max:11', 'min:11'],
            'body' => 'required'
        ]);

        $message = new Message;

        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->mobile = $request->input('mobile');
        $message->body = $request->input('body');

        $message->save();

        return redirect()->route('homepage')->with('success', 'Successfully sent your message.');
    }
    public function package_show($tour_code){
        $package = Package::where('tour_code', $tour_code)->first();
        return view('pages.package.show', compact('package'));
    }
    public function package_book($tour_code){
        $package = Package::where('tour_code', $tour_code)->first();
        return view('pages.package.book', compact('package'));
    }
    public function package_book_store(Request $request){

        $this->validate($request, [
            'package_id' => 'required',
            'adult' => 'required',
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'street' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);

        $reqAdult = $request->input('adult');
        $reqChildren = $request->input('children');
        $reqPack = $request->input('package_id');

        $packageDB = Package::find($reqPack);
        $packAmount = $packageDB->amount;

        $adultAmount = $reqAdult * $packAmount;
        $childAmount = $reqChildren * $packAmount;

        $totalAmount = $adultAmount + $childAmount;

        $book = new Book;

        $book->package_id = $reqPack;
        $book->adult = $reqAdult;
        $book->children = $reqChildren;
        $book->name = $request->input('name');
        $book->email = $request->input('email');
        $book->mobile = $request->input('mobile');
        $book->street = $request->input('street');
        $book->city = $request->input('city');
        $book->zip = $request->input('zip');
        $book->country = $request->input('country');
        $book->amount = $totalAmount;

        $book->save();

        return redirect()->route('book.payment.form', $book->id);

    }
    public function book_payment($id){
        $book = Book::find($id);
        return view('pages.book_payment', compact('book'));
    }
    public function book_payment_store(Request $request, $id){
        $this->validate($request, [
            'email' => 'required|email',
            'mobile' => 'required|min:11',
            'transaction_id' => 'required|string',
            'amount' => 'required',
        ]);
        if($request->input('method') != null){
            //Change book payment status
            $book = Book::find($id);
            if($book->payment == false){
                $book->payment = true;
                $book->save();
            }
            //Save new payment details to the DB
            $payment = new Payment;
            $payment->email = $request->input('email');
            $payment->mobile = $request->input('mobile');
            $payment->transaction_id = $request->input('transaction_id');
            $payment->amount = $request->input('amount');
            $payment->method = $request->input('method');
            $payment->save();
            return redirect()->route('homepage')->with('success', 'Successfully Paid, Login with that email for details information.');

        }else{
            return back()->withInput()->with('error', 'Please select a payment method');
        }
    }
    public function foreign_exchange(){
        $exchanges = Exchange::all();
        return view('pages.exchange.book', compact('exchanges'));
    }
    public function foreign_exchange_store(Request $request){
        $this->validate($request, [
            'type' => 'required',
            'exchange_id' => 'required',
            'amount' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ]);

        $type = $request->input('type');
        $exchange_id = $request->input('exchange_id');
        $amount = $request->input('amount');

        $exchange = Exchange::find($exchange_id);
        $exchangeRate = $exchange->rate;
        $amountBdt = $amount * $exchangeRate;


        if($type != 'null' && $exchange_id != 'null'){
            $ex = new Exchange_Book;
            $ex->exchange_id = $exchange_id;
            $ex->type = $type;
            $ex->amount = $amount;
            $ex->bdt_amount = $amountBdt;
            $ex->mobile = $request->input('mobile');
            $ex->email = $request->input('email');
            $ex->save();
            // redirect depending on type selection
            if($ex->type != 'Cash'){
                return view('pages.exchange.address', compact('ex'));
            }else{
                return view('pages.exchange.payment', compact('ex'));
            }
            // return redirect()->route('homepage')->with('success', 'Successfully Requested for Money Exchange.');
        }else{
            return back()->withInput()->with('error', 'Please Choose Exchange Type and Currency and Try Again.');
        }
    }
    public function foreign_exchange_address(Request $request, $id){
        $this->validate($request, [
            'street' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'country' => 'required',
        ]);
        $exB = Exchange_Book::find($id);
        $exB->street = $request->input('street');
        $exB->city = $request->input('city');
        $exB->zip = $request->input('zip');
        $exB->country = $request->input('country');
        $exB->save();
        return redirect()->route('homepage')->with('success', 'Successfully sent the request.');
    }
    public function foreign_exchange_payment(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'mobile' => 'required|min:11',
            'transaction_id' => 'required|string',
            'amount' => 'required',
        ]);
        if($request->input('method') != null){
            $payment = new Payment;
            $payment->email = $request->input('email');
            $payment->mobile = $request->input('mobile');
            $payment->transaction_id = $request->input('transaction_id');
            $payment->amount = $request->input('amount');
            $payment->method = $request->input('method');
            $payment->save();
            return redirect()->route('homepage')->with('success', 'Successfully Paid.');
        }else{
            return 'Error during payment';
        } 
    }
    public function hotel_booking(){
        
        return view('pages.hotel.booking');
    }
}
