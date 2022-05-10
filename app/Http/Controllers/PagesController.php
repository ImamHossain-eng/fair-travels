<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homepage(){
        return view('pages.HomePage');
    }
    public function pageByName($name){
        return view('pages.static.'.$name);
    }
}
