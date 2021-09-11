<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{

    public function index()
    {
        $quizzes=Quiz::latest()->get();
        return view('quizzes.index', compact('quizzes'));
    }
    public function create()
    {
        return view('quizzes.create');
    }

    public function edit(Quiz $quiz)
    {
        return view('quizzes.edit',compact('quiz'));
    }
}
