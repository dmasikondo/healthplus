<?php

namespace App\Http\Livewire\Quiz;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Quiz;
use Auth;

class Create extends Component
{
    public $question;
    public $answer;
    public $choice1;
    public $choice2;
    public $instruction;
    public $options=[]; 
    public $quizCount;
    public $quiz;
    public $quiz_id;
    public $slug;

     protected function resetForm()
    {
        $this->reset('question','answer','choice1','choice2','instruction','options','quiz');
    }
    public function clearErrors()
    {
        $this->resetValidation();
    } 

    public function createQuiz()
    {        
        $validateData =$this->validate([
            'question'=>'required',
            'answer'=>'required',
            'choice1'=>'required',
            'choice2'=>'required',
            'instruction'=>'required',
            ]);
            if(empty($this->quiz))
            {
               $this->slug =Str::slug($this->question).uniqid();
            }
            else{
                $this->slug = $this->quiz->slug;  
            }
        
            $this->options =array($this->answer,$this->choice1,$this->choice2);
        
            Auth::user()->quizzes()->updateOrCreate(['id'=>$this->quiz_id],['question' =>$this->question, 'answer' =>$this->answer,
                'allChoices'=>$this->options, 'slug'=>$this->slug,'instructionText'=>$this->instruction,
            ]);
       
            $this->resetValidation();
            $this->resetForm();
        
            if(empty($this->quiz_id))
            {
               session()->flash('message', 'Your quiz question was successfully created');  
               $this->quizCount=$this->quizCount+1;
            }
            else{
                session()->flash('message', 'Your quiz question was successfully updated');  

            }

            return redirect('/quizzes');
            
                 

    }
    public function mount()
    {
        $this->quizCount = Quiz::count();
        /**
         * if quiz model is not empty (editing or deleting)
         */
        if(!empty($this->quiz))
        {
            $this->question = $this->quiz->question;
            $this->answer = $this->quiz->answer;
            $this->choice1 = $this->quiz->allChoices[1];
            $this->choice2 = $this->quiz->allChoices[2];
            $this->instruction = $this->quiz->instructionText;  
            $this->quiz_id =$this->quiz->id;          
        }

    }

    public function render()
    {
        return view('livewire.quiz.create');
    }
}
