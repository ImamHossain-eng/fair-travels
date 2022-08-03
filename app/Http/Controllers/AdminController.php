<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Message;
use App\Models\Package;
use App\Models\Book;
use App\Models\Exchange;
use App\Models\Exchange_Book;
use App\Models\Slider;
use App\Models\Payment;
use App\Models\CTrip;
use App\Models\Hotel;

use Image, File;

class AdminController extends Controller
{
    public function home(){
        return view('admin.home');
    }
    public function profile(){
        return view('admin.profile');
    }
    public function admin_index(){
        $users = User::where('role', 'admin')->latest()->paginate(10);
        return view('admin.admin.index', compact('users'));
    }
    public function admin_store(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 'admin';

        $user->save();

        return redirect()->route('admin.admin.index')->with('success', 'Successfully Created new Admin.');

    }
    public function user_index(){
        $users = User::where('role', 'user')->latest()->paginate(10);
        return view('admin.user.index', compact('users'));
    }
    public function user_edit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }
    public function user_update(Request $request, $id){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'max:191']
        ]);

        $user = User::find($id);
        $oldPass = $user->password;
        $userRole = $user->role;

        if($request->input('password') != null){
            $password = bcrypt($request->input('password'));
        }else{
            $password = $oldPass;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $password;

        $user->save();

        if($userRole == 'admin'){
            return redirect()->route('admin.admin.index')->with('success', 'Successfully Updates.');
        }else{
            return redirect()->route('admin.user.index')->with('success', 'Successfully updated.');
        }
    }

    public function user_destroy($id){
        $user = User::find($id);
        $userRole = $user->role;
        $user->delete();
        if($userRole == 'admin'){
            return redirect()->route('admin.admin.index')->with('error', 'Successfully Removed.');
        }else{
            return redirect()->route('admin.user.index')->with('error', 'Successfully Removed.');
        }

        
    }
    public function message_index(){
        $messages = Message::latest()->paginate(10);
        return view('admin.message.index', compact('messages'));
    }
    public function message_show($id){
        $message = Message::find($id);
        if($message->status == false){
            $message->status = true;
            $message->save();
        }
        return view('admin.message.show', compact('message'));
    }

    public function package_index(){
        $packages = Package::latest()->paginate(10);
        return view('admin.package.index', compact('packages'));
    }
    public function package_store(Request $request){
        //Validation
        $this->validate($request, [
            'tour_code' => ['required', 'string', 'unique:packages'],
            'date' => 'required',
            'amount' => 'required',
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'description' => 'required'
        ]);
        //Image Upload
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(700, 400)->save(public_path('/images/packages/'.$file_name));
        }
        else{
            $file_name = 'no_image.png';
        }
        //Initiate Object
        $package = new Package;
        //Assign properties
        $package->tour_code = $request->input('tour_code');
        $package->date = $request->input('date');
        $package->amount = $request->input('amount');
        $package->country = $request->input('country');
        $package->city = $request->input('city');
        $package->type = $request->input('type');
        $package->image = $file_name;
        $package->description = $request->input('description');
        //Save the object to DB
        $package->save();
        //Response
        return redirect()->route('admin.package.index')->with('success', 'Successfully Inserted.');
    }
    public function package_edit($id){
        $package = Package::find($id);
        return view('admin.package.edit', compact('package'));
    }
    public function package_update(Request $request, $id){
        //Validation
        $this->validate($request, [
            'tour_code' => ['required', 'string'],
            'date' => 'required',
            'amount' => 'required',
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'description' => 'required'
        ]);
        $package = Package::find($id);
        $oldImg = $package->image;
        //Image Upload
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(700, 400)->save(public_path('/images/packages/'.$file_name));
            if($oldImg != 'no_image.png'){
                File::delete(public_path('/images/packages/'.$oldImg));
            }
        }else{
            $file_name = $oldImg;
        }
        //Assign properties
        $package->tour_code = $request->input('tour_code');
        $package->date = $request->input('date');
        $package->amount = $request->input('amount');
        $package->country = $request->input('country');
        $package->city = $request->input('city');
        $package->type = $request->input('type');
        $package->image = $file_name;
        $package->description = $request->input('description');
        //Save the object to DB
        $package->save();
        //Response
        return redirect()->route('admin.package.index')->with('warning', 'Successfully Updated.');
    }
    public function package_destroy($id){
        $package = Package::find($id);
        $oldImg = $package->image;
        if($oldImg != 'no_image.png'){
            File::delete(public_path('/images/packages/'.$oldImg));
        }
        $package->delete();
        return redirect()->route('admin.package.index')->with('error', 'Successfully Removed.');
    }
    public function enrolled_package(){
        $packages = Book::latest()->paginate(10);
        return view('admin.package.booking', compact('packages')); 
    }
    public function enrolled_update(Request $request, $id){
        $pack = Book::find($id);
        if($pack->status == false){
            $pack->status = true;
            $pack->save();
            return redirect()->route('admin.enrolled.package')->with('success', 'Enrolled Package Updated');
        }elseif($pack->status == true){
            $pack->status = false;
            $pack->save();
            return redirect()->route('admin.enrolled.package')->with('success', 'Enrolled Package Updated');
        }else{
            return back()->with('error', 'Failed.');
        }
    }
    public function enrolled_destroy($id){
        Book::find($id)->delete();
        return redirect()->route('admin.enrolled.package')->with('error', 'Successfully Removed.');
    }
    public function exchange_index(){
        $exchanges = Exchange::latest()->paginate(10);
        return view('admin.exchange.index', compact('exchanges'));
    }
    public function exchange_store(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'short_form' => 'required|string',
            'rate' => 'required',
        ]);

        $exchange = new Exchange;

        $exchange->name = $request->input('name');
        $exchange->short_form = $request->input('short_form');
        $exchange->rate = $request->input('rate');

        $exchange->save();

        return redirect()->route('admin.exchange.index')->with('success', 'Successfully Inserted.');
    }
    public function exchange_destroy($id){
        Exchange::find($id)->delete();
        return redirect()->route('admin.exchange.index')->with('error', 'Successfully Removed.');
    }
    public function exchange_status($id){
        $exchange = Exchange::find($id);
        $status = $exchange->status;
        if($status == false){
            $exchange->status = true;
        }else{
            $exchange->status = false;
        }
        $exchange->save();
        return redirect()->route('admin.exchange.index')->with('warning', 'Successfully Updated.');
    }
    public function money_request(){
        $requests = Exchange_Book::latest()->paginate(10);
        return view('admin.exchange.request', compact('requests'));
    }
    public function money_status($id){
        $request = Exchange_Book::find($id);
        $st = $request->status;

        if($st == false){
            $request->status = true;
        }else{
            $request->status = false;    
        }
        $request->save(); 
        return redirect()->route('admin.money.index')->with('success', 'Successfully Updated.'); 
    }
    public function slider_index(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }
    public function slider_store(Request $request){
        $this->validate($request, [
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(1200, 800)->save(public_path('/images/sliders/'.$file_name));
        }
        else{
            return back()->withInputs()->with('error', 'Please select an image');
        }

        $slider = new Slider;
        $slider->user_id = auth()->user()->id;
        $slider->title = $request->input('title');
        $slider->subtitle = $request->input('subtitle');
        $slider->image = $file_name;
        $slider->save();
        return redirect()->route('admin.slider.index')->with('success', 'Successfully uploaded.');
    }
    public function slider_destroy($id){
        $slider = Slider::find($id);
        File::delete(public_path('images/sliders/'.$slider->image));
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('error', 'Successfully removed.');
    }
    public function slider_edit($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }
    public function slider_update(Request $request, $id){
        $this->validate($request, ['title' => 'required|string']);

        $slider = Slider::find($id);
        $oldImage = $slider->image;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(1200, 800)->save(public_path('/images/sliders/'.$file_name));
            File::delete(public_path('/images/sliders/'.$oldImage));
        }else{
            $file_name = $oldImage;
        }

        $slider->title = $request->input('title');
        $slider->subtitle = $request->input('subtitle');
        $slider->image = $file_name;
        $slider->save();
        return redirect()->route('admin.slider.index')->with('warning', 'Successfully Updated.');
    }
    public function payment_index(){
        $payments = Payment::latest()->paginate(10);
        return view('admin.payment.index', compact('payments'));
    }
    public function payment_confirm($id){
        $payment = Payment::find($id);
        if($payment->status == false){
            $payment->status = true;
            $payment->save();

            //Make the booking confirm
            // $book = Book::where('email', $payment->email)->where('payment', true)->where('status', false)->first();
            // if($book && $book->amount == $payment->amount){
            //     $book->status = true;
            //     $book->save();
            // }
        }
        return redirect()->route('admin.payment.index')->with('success', 'Successfully confirm this payment.');
    }
    //Ctrip Functions
    public function ctrip_index(){
        $ctrips = CTrip::latest()->paginate(10);
        return view('admin.ctrip.index', compact('ctrips'));
    }
    public function ctrip_store(Request $request){
        $this->validate($request, [
            'port' => 'required|string',
            'date' => 'required|date',
            'price' => 'required',
            'info' => 'required'
        ]);

        $trip = new CTrip;
        $trip->port = $request->port;
        $trip->date = $request->date;
        $trip->price = $request->price;
        $trip->info = $request->info;
        $trip->save();
        return redirect()->route('admin.ctrip.index')->with('success', 'Successfully Inserted.');
    }
    public function ctrip_delete($id){
        CTrip::find($id)->delete();
        return redirect()->route('admin.ctrip.index')->with('error', 'Successfully Removed.');
    }
    public function ctrip_edit($id){
        $trip = CTrip::find($id);
        return view('admin.ctrip.edit', compact('trip'));
    }
    public function ctrip_update(Request $request, $id){
        $this->validate($request, [
            'port' => 'required|string',
            'price' => 'required',
            'info' => 'required'
        ]);

        $trip = CTrip::find($id);

        $request->date == null ? $date = $trip->date : $date = $request->date;

        $trip->port = $request->port;
        $trip->date = $date;
        $trip->price = $request->price;
        $trip->info = $request->info;
        $trip->save();
        
        return redirect()->route('admin.ctrip.index')->with('success', 'Successfully Updated.');
    }
    public function hotel_index(){
        $hotels = Hotel::latest()->paginate(10);
        return view('admin.service.hotel', compact('hotels'));
    }
}
