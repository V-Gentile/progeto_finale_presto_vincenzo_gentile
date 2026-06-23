<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use App\Mail\BecomRevisor;
use App\Models\Article;
use App\Models\User;

class RevisorController extends Controller
{
    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomRevisor(Auth::user()));
        return redirect()->route('home')->with('message', 'Complimenti, Hai richiesto di diventare revisor');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }

    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->orderBy('created_at', 'asc')->first();
        
        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article)
    {
        $article->is_accepted = true;
        $article->save();

        return redirect()->back()->with('message', 'Annuncio accettato!')->with('last_article_id', $article->id);
    }

    public function reject(Article $article)
    {
        $article->is_accepted = false;
        $article->save();

        return redirect()->back()->with('message', 'Annuncio rifiutato!')->with('last_article_id', $article->id);
    }

    public function undo($id)
    {
        $article = Article::find($id);
        
        if ($article) {
            $article->is_accepted = null;
            $article->save();
        }

        return redirect()->back()->with('message', 'Azione annullata. Annuncio ripristinato.');
    }
}
