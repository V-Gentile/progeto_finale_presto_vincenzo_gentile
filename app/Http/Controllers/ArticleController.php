<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('is_accepted', true)->latest()->take(30)->get();
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function byCategory($category_id)
    {
        $category = Category::find($category_id);
        $articles = $category->articles()->where('is_accepted', true)->latest()->take(30)->get();
        return view('articles.category', compact('category', 'articles'));
    }
}
