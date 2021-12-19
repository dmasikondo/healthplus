<?php

namespace App\Http\Livewire\Users;

use App\Http\Livewire\Modal;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserRoleWasChanged;
class ManageRoles extends Modal
{
    use AuthorizesRequests;
    public $status='suspended';
    public $surname;
    public $email;
    public $first_name;
    public $created;
    public $user;
    public $slug;
    public $listUserRoles =[];
    public $availableUserRoles =[];
    public $roles =[];
    public $currentUrl;
    public $admin;
    public $admins;

    public function resetForm()
    {
        $this->resetErrorBag();
    }    

    /**
     * Show the interface to suspend the user      
     */

    public function editUserRole($slug)
    {
        $this->show();
        $this->user = User::whereSlug($slug)->with('roles')->firstOrFail();
        $this->availableUserRoles = Role::orderBy('name')->get();
        $this->surname = $this->user->surname;
        $this->first_name = $this->user->first_name;
        $this->email = $this->user->email;
        $this->listUserRoles = $this->user->roles;
        $this->created = $this->user->created_at->diffForHumans();
        $this->getUserStatus();
        $this->admini = auth()->user();
        $this->admins = User::whereHas('roles',function($q){
            $q->where('name','admin')
                ->orWhere('name','superadmin');
        })->get();   
    } 

    public function updateUserRoles()
    {  
        $this->authorize('update', $this->user, Auth::user());     
        $this->user->roles()->sync($this->roles);       
        session()->flash('message',"The user: '$this->surname $this->first_name' was successfully given new roles");
        //send a notification to all admins and superadmins that the user's roles were changed
        Notification::send($this->admins, new UserRoleWasChanged($this->user, $this->admini->first_name, $this->admini->surname)); 
        return redirect($this->currentUrl);        
    }    
    /**
     * Check the user's account status
     */
    private function getUserStatus()
    {
        if($this->user->is_suspended && $this->user->must_reset)
        {
            $this->status = 'suspended and deactivated';
        }
        elseif($this->user->must_reset)
        {
            $this->status = 'deactivated';            
        }
        elseif($this->user->is_suspended)
        {
            $this->status = 'suspended';           
        }
        else{
            $this->status = 'active';            
        }           
    }   

    public function mount()
    {
        $this->currentUrl = url()->current();
    }     
    public function render()
    {
        return view('livewire.users.manage-roles');
    }
}
