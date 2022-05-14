<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;

class UserController extends Controller
{
    public function package_enrolled(){
        $packages = Book::where('email', auth()->user()->email)->latest()->paginate(10);
        return view('user.package.index', compact('packages'));
    }
}
