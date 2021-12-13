<?php

namespace App\Http\Livewire\Article;

use App\Http\Livewire\Modal;
use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
        $this->article->delete();
        session()->flash('message', 'Your article item was successfully deleted');  
        return redirect('articles');
    }
    public function dontDelete()
    {
        //$this->hide();
       session()->flash('message', 'Your article item is safe!');  
       return redirect('articles'); 
    }
    public function render()
    {
        return view('livewire.article.delete');
    }
}
