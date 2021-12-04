<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Http\Livewire\Modal;
use App\Models\User;
use URL;

class SuspendUser extends Modal
{

    public $status='suspended';
    public $surname;
    public $email;
    public $first_name;
    public $created;
    public $roles;
    public $user;
    public $slug;
    public $listRoles =[];
    public $currentUrl;
    public $showSuspendUserBtn = false;


    public function resetForm()
    {
        $this->resetErrorBag();
    }    

    /**
     * Show the interface to suspend the user      
     */

    public function suspendUserAccount($slug)
    {
        $this->show();
        $this->user = User::whereSlug($slug)->with('roles')->firstOrFail();
        $this->surname = $this->user->surname;
        $this->first_name = $this->user->first_name;
        $this->email = $this->user->email;
        $this->listRoles = $this->user->roles;
        $this->created = $this->user->created_at->diffForHumans();
        $this->getUserStatus();
      
    } 

    /**
     * suspend the user
     *  (account will be set to suspended)
     * (user will not be able to access any resources requiring authentication)
     */

    public function suspendUser()
    {
        // first check if the user is not already suspended

        if($this->user->is_suspended)
        {            
            session()->flash('warning',"The user: '$this->surname $this->first_name' is already suspended, your request was not actioned");  
            return redirect($this->currentUrl);     
        }

        //if user is not already suspended then suspend

        else{
            $this->user->update(['is_suspended'=>true]); 
            session()->flash('message',"The user: '$this->surname $this->first_name' was successfully suspended");
            return redirect($this->currentUrl);

        }

    }

    /**
     * unsuspend the user
     * (account will be set to not suspended)
     * (user will login as usual when suspension is uplifted, if password is forgotten will have to restore via forgot password)
     */
    public function unsuspendUser()
    {
        // first check if the user is not already unsuspended

        if(!$this->user->is_suspended)
        {            
            session()->flash('warning',"The user: '$this->surname $this->first_name' is already unsuspended, your request was not actioned");  
            return redirect($this->currentUrl);     
        }
        //if user is not already unsuspended then unsuspend

        else{
            $this->user->update(['is_suspended'=>false]); 
            session()->flash('message',"The user: '$this->surname $this->first_name' was successfully unsuspended");
            return redirect($this->currentUrl);

        }        
    }

    /**
     * Check the user's account status
     */
    private function getUserStatus()
    {
        if($this->user->is_suspended && $this->user->must_reset)
        {
            $this->status = 'suspended and deactivated';
            $this->showSuspendUserBtn = false;
        }
        elseif($this->user->must_reset)
        {
            $this->status = 'deactivated';
            $this->showSuspendUserBtn = true;
        }
        elseif($this->user->is_suspended)
        {
            $this->status = 'suspended';
            $this->showSuspendUserBtn = false;
        }
        else{
            $this->status = 'active';
            $this->showSuspendUserBtn = true;
        }           
    }

    public function mount()
    {
        $this->currentUrl = url()->current();
        
    }





    public function render()
    {
        return view('livewire.users.suspend-user');
    }
}
