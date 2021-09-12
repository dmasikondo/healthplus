<?php

namespace App\Http\Livewire\Quiz;

use App\Http\Livewire\Modal;
use App\Models\Quiz;

class Delete extends Modal
{
    public $question;
    public $answer;
    public $instructionText;
    public $allChoices=[];
    public $created;
    public $quiz;
    public function resetForm()
    {
        $this->resetErrorBag();
    }  
    public function deleteQuiz($slug)
    {
        $this->show();
        $this->quiz = Quiz::whereSlug($slug)->firstOrFail();
        $this->question = $this->quiz->question;
        $this->answer = $this->quiz->answer;
        $this->instructionText = $this->quiz->instructionText;
        $this->allChoices = $this->quiz->allChoices;
        $this->created = $this->quiz->created_at->diffForHumans();


    }   

    public function yesDelete() 
    {
        $this->quiz->delete();
        session()->flash('message', 'Your quiz question was successfully deleted');  
        return redirect('quizzes');
    }
    public function dontDelete()
    {
        //$this->hide();
       session()->flash('message', 'Your quiz item is safe!');  
       return redirect('quizzes'); 
    }  
    public function render()
    {
        return view('livewire.quiz.delete');
    }


}
