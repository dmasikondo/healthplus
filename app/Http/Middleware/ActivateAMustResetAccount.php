<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ActivateAMustResetAccount
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
        if($request->user()->must_reset == 1){
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();  
                     
             session()->flash('warning', "Your account is not activated. Please Login to activate."); 
             return redirect('/');
           // return redirect('/users/registration');
        }
        return $next($request);
    }
}
