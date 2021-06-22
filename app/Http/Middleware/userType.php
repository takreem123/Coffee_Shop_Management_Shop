<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class userType
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
    
        if(Auth::check()){
        if (Auth::user()->roles[0]->usertype=='user') {
            return redirect('home')->with('error','Access Denied');
        }
        return $next($request);
    }else{
        return redirect('auth.login'); 
    }
    }
}
