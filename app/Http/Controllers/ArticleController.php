<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function prevention()
    {
        $articles = Article::where('category','prevention')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function treatment()
    {
        $articles = Article::where('category','treatment')->latest()->get();
        return view('articles.index', compact('articles'));
    } 

    public function pmtct()
    {
        $articles = Article::where('category','pmtct')->latest()->get();
        return view('articles.index', compact('articles'));
    }        
}
