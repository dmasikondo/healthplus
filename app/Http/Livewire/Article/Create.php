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
            'fileName'=>'nullable|mimes:jpg,gif,jpeg,png,pdf|max:2048',
            'description'=>'required',
            'title'=>'required',
            'category'=>'required',
            ],
                
                [
                    'fileName.mimes:pdf,jpg,gif,jpeg,png' => 'The file must be 
                    in the format: pdf, jpg, gif, jpeg, png',
                ], 
                [
                    'fileName.max' => 'The selected file size must not exceed 2 MB',
                ],     
                [
                    'comment.required_without:fileName' => 'You can not submit an empty message',
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

            session()->flash('message', 'Your article was successfully created');  
    }    
    public function render()
    {
        return view('livewire.article.create');
    }
}
