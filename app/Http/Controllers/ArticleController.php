<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(10);
        return view('article.index', compact('articles'));
    }

    public function show(Article $article)
    {
        // L'iniezione di un singolo modello resta al singolare
        return view('article.show', compact('article'));
    }

    public function byCategory(Category $category)
    {
        // Utilizzo del Query Builder () per filtrare direttamente nel database
        $articles = $category->articles()->where('is_accepted', true)->get();
        return view('article.byCategory', compact('articles', 'category'));
    }
}
