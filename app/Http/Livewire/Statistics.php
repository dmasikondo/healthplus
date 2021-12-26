<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\User;

class Statistics extends Component
{
    public $articles;
    public $published_articles;
    public $unpublished_articles;
    public $pmtct_articles;
    public $prevention_articles;
    public $treatment_articles;
    public $users;
    public $active_users;
    public $usersWithUnverifiedEmail;
    public $inactive_users;
    public $suspended_users;
    public $admin_users;
    public $superadmin_users;
    public $author_users;
    public $publisher_users;



    public function render()
    {
         $this->articles = Article::count();
         $this->published_articles=Article::whereNotNull('published_at')->count();
         $this->unpublished_articles= Article::whereNull('published_at')->count();
         $this->pmtct_articles= Article::where('category','pmtct')->count();
         $this->prevention_articles= Article::where('category','prevention')->count();
         $this->treatment_articles= Article::where('category','treatment')->count();
         $this->users =User::count();
         $this->active_users = User::where('must_reset',false)->where('is_suspended',false)->whereNotNull('email_verified_at')->count();
         $this->usersWithUnverifiedEmail=User::whereNull('email_verified_at')->count();
         $this->inactive_users = User::where('must_reset')->count();
         $this->suspended_users = User::where('must_reset')->count();
         $this->admin_users =User::whereHas('roles', fn($query)=>$query->where('name','admin'))->count();;
         $this->superadmin_users =User::whereHas('roles', fn($query)=>$query->where('name','superadmin'))->count();
         $this->author_users =User::whereHas('roles', fn($query)=>$query->where('name','author'))->count();;
         $this->publisher_users =User::whereHas('roles', fn($query)=>$query->where('name','publisher'))->count();;        
        return view('livewire.statistics');
    }
}
