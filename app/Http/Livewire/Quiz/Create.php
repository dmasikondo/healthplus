<?php

namespace App\Http\Livewire\Quiz;

use Livewire\Component;
use Illuminate\Support\Str;
use Auth;

class Create extends Component
{
    public $question;
    public $answer;
    public $choice1;
    public $choice2;
    public $instruction;
    public $options=[]; 

     protected function resetForm()
    {
        $this->reset('question','answer','choice1','choice2','instruction','options');
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
        $slug =Str::slug($this->question);
        $this->options =array($this->answer,$this->choice1,$this->choice2);
        
            Auth::user()->quizzes()->create(['question' =>$this->question, 'answer' =>$this->answer,
                'allChoices'=>$this->options, 'slug'=>$slug.uniqid(),'instructionText'=>$this->instruction,
            ]);
       
            $this->resetValidation();
            $this->resetForm();

            session()->flash('message', 'Your quiz question was successfully created');      

    }

    public function render()
    {
        return view('livewire.quiz.create');
    }
}
