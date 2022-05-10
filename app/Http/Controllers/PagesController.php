<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;

class PagesController extends Controller
{
    public function homepage(){
        return view('pages.HomePage');
    }
    public function pageByName($name){
        return view('pages.static.'.$name);
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
}
