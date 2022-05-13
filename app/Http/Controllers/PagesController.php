<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\Package;

class PagesController extends Controller
{
    public function homepage(){
        $packages = Package::latest()->take(3)->get();
        return view('pages.HomePage', compact('packages'));
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
            'mobile' => ['required', 'max:11'],
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
}
