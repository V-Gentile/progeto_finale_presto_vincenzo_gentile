<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use App\Mail\BecomeRevisor;
use App\Models\Article;
use App\Models\User;

class RevisorController extends Controller
{
    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('home')->with('message', 'Complimenti, Hai richiesto di diventare revisor');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }

    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        
        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()
            ->back()
            ->with('message', "Accettato annuncio {$article->title}");
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()
            ->back()
            ->with('message', "Rifiutato annuncio {$article->title}");
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
