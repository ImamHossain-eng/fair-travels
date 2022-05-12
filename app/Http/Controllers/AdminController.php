<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Message;
use App\Models\Package;

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
}
