<?php

namespace App\Http\Livewire\Article;

use App\Http\Livewire\Modal;
use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ArticleWasPublished;
use App\Models\User;

class Publish extends Modal
{
    use AuthorizesRequests;
    public $author;
    public $articleTitle;
    public $created;
    public $article;
    public $currentUrl;
    public $icon;

    public function resetForm()
    {
        $this->resetErrorBag();
    }
    public function publishArticle($slug)
    {
        $this->article = Article::whereSlug($slug)->firstOrFail();
        $this->authorize('publish', $this->article);
        $this->usersToBeNotified();
        if(is_null($this->article->published_at)){
            $this->article->update(['published_at'=>now()]);
            //send a notification to all publishers, owner and superadmins that account has been published
            Notification::send($this->admins, new ArticleWasPublished(auth()->user(), $this->article->title, 'Published the article','eye',$this->article->slug));
            $this->notifyArticleOwner('eye','Published your article');
            session()->flash('message',"The article waas successfully published, it is now visible to everyone");            
        }
        else{
            $this->article->update(['published_at'=>NULL]);
            //send a notification to all publishers, owner and superadmins that account has been unpublished
            Notification::send($this->admins, new ArticleWasPublished(auth()->user(), $this->article->title, 'Unpublished the article','eye-off',$this->article->slug)); 
            $this->notifyArticleOwner('eye-off','Unpublished your article');          
            session()->flash('message',"The article waas successfully Unpublished, it is no longer visible to everyone");            
        }
        return redirect($this->currentUrl);   

    }

    private function usersToBeNotified()
    {
        $this->admins = User::whereHas('roles',function($q){
            $q->where('name','publisher')
                ->orWhere('name','superadmin');
        })->get();         
    } 

    private function notifyArticleOwner($icon, $message)
    {
        $this->icon = $icon;
        $this->message = $message;
        $this->admins = User::where('id',$this->article->user_id)->firstOrFail();
        Notification::send(
            $this->admins, new ArticleWasPublished(auth()->user(), 
            $this->article->title, $this->message,$this->icon,$this->article->slug));        
    }   

    public function mount()
    {
        $this->currentUrl = url()->current();
    }
    public function render()
    {
        return view('livewire.article.publish');
    }
}
