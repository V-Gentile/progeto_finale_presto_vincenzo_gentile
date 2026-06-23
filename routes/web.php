<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
use App\Http\Middleware\IsRevisor;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/annunci/crea', function () {
    return view('articles.create');
})->middleware('auth');

Route::get('/annunci', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/annuncio/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/categoria/{category_id}', [ArticleController::class, 'byCategory'])->name('articles.byCategory');

Route::get('/lavora-con-noi', [PublicController::class, 'careers'])->middleware('auth')->name('careers');

Route::post('/lavora-con-noi/submit', [PublicController::class, 'careersSubmit'])->middleware('auth')->name('careers.submit');

Route::get('/revisore/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('/revisore/home', [RevisorController::class, 'index'])->middleware(['auth', IsRevisor::class])->name('revisor.index');

Route::patch('/revisore/accetta/{article}', [RevisorController::class, 'accept'])->middleware(['auth', IsRevisor::class])->name('revisor.accept');

Route::patch('/revisore/rifiuta/{article}', [RevisorController::class, 'reject'])->middleware(['auth', IsRevisor::class])->name('revisor.reject');

Route::patch('/revisore/annulla/{id}', [RevisorController::class, 'undo'])->middleware(['auth', IsRevisor::class])->name('revisor.undo');

Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');

Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');
