<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use App\Models\Article;

class PublicController extends Controller
{
    public function home()
    {
        $articles = Article::where('is_accepted', true)->latest()->take(4)->get();
        return view('home', compact('articles'));
    }

    public function careers()
    {
        return view('careers');
    }

    public function careersSubmit()
    {
        $user = Auth::user();
        Mail::to('admin@presto.it')->send(new BecomeRevisor($user));
        
        return redirect('/')->with('message', 'Richiesta inviata con successo!');
    }

    public function searchArticles(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->paginate(10);
        return view('articles.search', ['articles' => $articles, 'query' => $query]);

    }

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
