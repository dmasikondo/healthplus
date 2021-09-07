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
    public $iteration=1;
    public $randomu =1;
    public $files;
    //public $files =[];

    protected function resetForm()
    {
        $this->reset('fileName','title','category','description','url');
    }
    public function clearErrors()
    {
        $this->resetValidation();
    }
    public function createArticle()
    {        
        $validateData =$this->validate([
            'fileName'=>'nullable|mimes:jpg,gif,jpeg,png,mp4,aac,ogg,mov,m4a,opus,amr,wma,qt',
            'description'=>'required',
            'title'=>'required',
            'category'=>'required',
            ],          

        );
        /**
         * store file
         */
        if(!empty($this->fileName)){            
            $url = $this->fileName->store('uploaded-files','public');
        }
        else{
            $url = '';
        }
            Auth::user()->articles()->create(['filePath' =>'storage/'.$url, 'title' =>$this->title,/*'user_id' => Auth::user()->id,*/
                'category'=>$this->category, 'description'=>$this->description,'slug'=>$this->title.uniqid(),
            ]);
       
            $this->resetValidation();
            $this->resetForm();
            $this->iteration++;

            session()->flash('message', 'Your article was successfully created');  
    }   

    public function editArticle($slug)
    {
        $article = Article::where('slug',$slug)->first();
        $this->title = $article->title;
        $this->category =$article->category;
        $this->description =$article->description;
    } 
    public function render()
    {
        return view('livewire.article.create');
    }
}
