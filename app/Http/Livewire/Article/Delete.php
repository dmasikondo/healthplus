<?php

namespace App\Http\Livewire\Article;

use App\Http\Livewire\Modal;
use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ArticleWasDeleted;
use App\Models\User;

class Delete extends Modal
{
    use AuthorizesRequests;
    public $author;
    public $articleTitle;
    public $created;
    public $article;

    public function resetForm()
    {
        $this->resetErrorBag();
    }
    public function deleteArticle($slug)
    {

        $this->show();
        $this->article = Article::whereSlug($slug)->firstOrFail();
        $this->articleTitle = $this->article->title;
        $this->created = $this->article->created_at->diffForHumans();
        $this->author =$this->article->user->first_name.' '.$this->article->user->surname;
        $this->authorize('update', $this->article);

    }

    public function yesDelete() 
    {
        $this->authorize('delete', $this->article);
        //if there is a file, first delete it
        if(!is_null($this->article->filePath)){
           $filePath =substr($this->article->filePath, 1);
            unlink($filePath);            
        }        
        $this->article->delete();        

        //send a notification to all admins and superadmins that an article has been deleted
        $this->usersToBeNotified();  
        Notification::send($this->admins, new ArticleWasDeleted(auth()->user(), $this->article->title));        
        session()->flash('message', 'Your article item was successfully deleted');  
        return redirect('articles');
    }
    public function dontDelete()
    {        
       session()->flash('message', 'Your article item is safe!');
       //$this->hide();
       return redirect('/articles/'.$this->article->slug); 
    }
    private function usersToBeNotified()
    {
        $this->admins = User::whereHas('roles',function($q){
            $q->where('name','publisher')
                ->orWhere('name','superadmin');
        })->get();         
    }    
    public function render()
    {
        return view('livewire.article.delete');
    }
}
