<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AccountIsSuspended
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
        if($request->user()->is_suspended == 1){
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();  
                     
             session()->flash('warning', "Your account has been suspended. Please contact your administrator"); 
             return redirect('/login');
           // return redirect('/users/registration');
        }
        return $next($request);
    }
}
