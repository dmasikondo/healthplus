<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Auth;

class ArticleController extends Controller
{
    public function index()
    {
        /**
         * if user has role of superadmin or publisher show all posts
         * if not admin or publisher show only published and own posts
         * if not logged in show published posts only
         */
        $posts = Article::with('user')->latest();
        if(Auth::check())
        {
             if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('publisher')){
                  $posts=$posts;
              }            
             elseif(!Auth::user()->hasRole('superadmin') || !Auth::user()->hasRole('publisher')){
                  $posts=$posts->where('user_id', Auth::user()->id)->orWhereNotNull('published_at');                  
              }  
        }
        else{
            //for unlogged users
            $posts = $posts->whereNotNull('published_at');

        }

        $articles = $posts->filter(request(['category','published','unpublished','content','name','second_name']))
                    ->paginate(3)
                    ->withQueryString(); 
        return view('articles.index', compact('articles'));
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

    /**
     * articles that were written by the user
     */
    public function myArticles()
    {
        $articles =Auth::user()->articles()->filter(request(['category','published','unpublished','content','name','second_name']))
        ->latest() 
        ->paginate(3)->withQueryString();   

        return view('articles.index', compact('articles'));    
    } 

    public function unpublished()
    {
        $articles = Article::with('user')->latest()->whereNull('published_at')
                    ->filter(request(['category','published','unpublished','content','name','second_name'])) 
                    ->paginate(3)->withQueryString(); 
        return view('articles.index', compact('articles'));         
    }      
}
