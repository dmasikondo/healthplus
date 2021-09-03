<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\Department;
use App\Models\User;
use Illuminate\Validation\Rule;
//use Auth;

class UserController extends Controller
{
    /**
     * Show the form for registering users
     * To Superadmin 
     */
    public function create()
    {
        //dd(Auth::user()->belongsTodepartmentOf('IT Unit'));
/*        if((Auth::user()->hasRole('hod') && Auth::user()->belongsTodepartmentOf('IT Unit')) || Auth::user()->hasRole('superadmin'))
        {*/
            $roles =Role::orderBy('name')->get();
            //dd('maboss');
            return view('users.create', compact('roles'));            
            
/*        }  
        else{
            abort(403, 'It seems you are not authorised to view this page!');
        }*/      

    }

    /**
     * Store the newly created user in storage
     */

    public function store()
    {
        $this->validate(request(), [
            'first_name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $slug = request()->surname.uniqid(); 
        $user= User::create([
            'slug' =>$slug,
            'surname' =>request()->surname,
            'first_name' =>request()->first_name,
            'email' => request()->email,
            'must_reset'=>true,
            'password' => Hash::make(request()->password),
        ]);
        $user->roles()->sync(request()->role); 
        session()->flash('message',"User was successfully registered"); 
         return redirect('/users/registration') ;    

    }

    /**
     * Show the form for activating a user account
     */

    public function activate()
    {        
       
        Auth::guard('web')->logout();            
        $slug= request()->ikokokwacho;
        
        return view('users.activate',compact('slug'));
    }

    /**
     * update (activate) the user account in database
     */
    public function activation()
    {

        $this->validate(request(), [
        'first_name' => ['required', 'string', 'max:255','exists:users,first_name'],
        'surname' => ['required', 'string', 'max:255', Rule::exists('users')
                ->where('first_name',request()->first_name)
                ->where('slug',request()->checkit)],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::where('slug',request()->checkit)->firstOrFail();
        /**
         * if account is already active, do not activate
         */
        if(!$user->must_reset)
        {
           session()->flash('warning',"This account is already active. You can log in using your last successful password"); 
             return redirect('/login') ;                 
        }
        $user->update(['must_reset' =>0,'password'=>Hash::make(request('password'))]);
        session()->flash('message',"Your account was successfully activated. You can now login using your new password"); 
         return redirect('/login') ;      

    }


}