<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use Livewire\WithFileUploads;
//use App\Models\File;
use Auth;

class Create extends Component
{
    use WithFileUploads;
    public $fileName;
    public $title;
    public $category;
    public $description;
    public $url;
    public $link = NULL;
    public $iteration=1;
    public $randomu =1;
    public $files;
    public $article;
    public $article_id;
    //public $files =[];

    protected function resetForm()
    {
        $this->reset('fileName','title','category','description','url','link');
    }
    public function clearErrors()
    {
        $this->resetValidation();
    }
    public function createArticle()
    {        
        $validateData =$this->validate([
            'fileName'=>'nullable|mimes:jpg,gif,jpeg,png,mp4,aac,ogg,mov,m4a,opus,amr,wma,qt,pdf',
            'description'=>'required',
            'title'=>'required',
            'category'=>'required',
            'link' =>'nullable',
            ],          

        );
        /**
         * store file
         */
        if(!empty($this->fileName)){            
            $url = $this->fileName->store('uploaded-files','public');
        }
        else{
            $url = NULL;
        }
  
            Auth::user()->articles()->updateOrCreate(['id'=>$this->article_id],['filePath' =>'storage/'.$url, 'title' =>$this->title,
                'category'=>$this->category, 'description'=>$this->description,'slug'=>$this->title.uniqid(),
                'link'=>$this->link,
            ]);
       
            $this->resetValidation();
            $this->resetForm();
            $this->iteration++;
            if(empty($this->article_id))
            {
               session()->flash('message', 'Your article was successfully created');  
            }
            else{
                session()->flash('message', 'Your article was successfully updated');  

            }
            return redirect('/articles');
    }   

/*    public function editArticle($slug)
    {
        $article = Article::where('slug',$slug)->first();
        $this->title = $article->title;
        $this->category =$article->category;
        $this->description =$article->description;
    } */

    public function mount()
    {
        if(!empty($this->article))
        {
            $this->title = $this->article->title;
            $this->category =$this->article->category;
            $this->description = $this->article->description;
            $this->link = $this->article->link;
            $this->article_id = $this->article->id;
        }
    }
    public function render()
    {
        return view('livewire.article.create');
    }
}
