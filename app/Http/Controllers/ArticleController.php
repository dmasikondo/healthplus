<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::filter(request(['category','published','unpublished','content','name','second_name']))
        ->latest()
         ->paginate(4)->withQueryString();
        return view('articles.index', compact('articles'));
        return view('articles.home', compact('articles'));
    }

    public function create()
    {
        $this->authorize('create', Article::class);
        return view('articles.create');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('articles.edit',compact('article'));
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
