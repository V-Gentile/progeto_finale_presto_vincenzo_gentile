<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;


Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/article/create', function () {
    return view('article.create');
})->middleware('auth')->name('article.create');

Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');

Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

Route::get('/lavora-con-noi', [PublicController::class, 'careers'])->middleware('auth')->name('careers');

Route::post('/lavora-con-noi/submit', [PublicController::class, 'careersSubmit'])->middleware('auth')->name('careers.submit');

Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->middleware('isRevisor')->name('accept');

Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->middleware('isRevisor')->name('reject');

Route::patch('/revisor/annulla/{id}', [RevisorController::class, 'undo'])->middleware('isRevisor')->name('revisor.undo');

Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');

Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');
