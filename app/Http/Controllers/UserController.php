<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Exchange_Book;

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
}
