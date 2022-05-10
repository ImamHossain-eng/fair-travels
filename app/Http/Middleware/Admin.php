<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()){
            if(auth()->user()->role == 'admin'){
                return $next($request);
            }else{
                return back()->with('error', 'You are not admin.');
            }
        }else{
            return redirect()->route('login')->with('error', 'You are unauthorized user');
        } 
    }
}
