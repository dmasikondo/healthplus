<?php

namespace App\Http\Livewire\Article;

use App\Http\Livewire\Modal;
use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Publish extends Modal
{
    use AuthorizesRequests;
    public $author;
    public $articleTitle;
    public $created;
    public $article;
    public $currentUrl;

    public function resetForm()
    {
        $this->resetErrorBag();
    }
    public function publishArticle($slug)
    {
        $this->article = Article::whereSlug($slug)->firstOrFail();
        $this->authorize('publish', $this->article);
        if(is_null($this->article->published_at)){
            $this->article->update(['published_at'=>now()]);
            session()->flash('message',"The article waas successfully published, it is now visible to everyone");            
        }
        else{
            $this->article->update(['published_at'=>NULL]);
            session()->flash('message',"The article waas successfully Unpublished, it is no longer visible to everyone");            
        }
        return redirect($this->currentUrl);   

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
