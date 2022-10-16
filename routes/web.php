<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\StatisticController;

Route::get('/',                             [HomeController::class, 'index'])->name('index');

Route::resource('/articles', ArticleController::class);
Route::get('/tags/{tag}',           [TagsController::class,  'index']);

Route::get('/news',              [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}',       [NewsController::class, 'show'])->name('news.show');

Route::get('/contacts',                     [ContactController::class, 'index'])->name('contacts');
Route::post('/contacts',                    [ContactController::class, 'store']);

Route::get('/admin',                        [AdminController::class, 'index'])->name('admin');
Route::get('/admin/feedback',               [AdminController::class, 'feedback']);

Route::get('/admin/statistics',               [StatisticController::class, 'index']);

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/articles',                 [AdminArticleController::class, 'index'])->name('article');
    Route::get('/articles/{article}/edit',  [AdminArticleController::class, 'edit'])->name('article.edit');
    Route::put('/articles/{article}',       [AdminArticleController::class, 'update'])->name('article.update');
    Route::delete('/articles/{article}',    [AdminArticleController::class, 'destroy'])->name('article.destroy');

    Route::get('/news',              [AdminNewsController::class, 'index'])->name('news.index');
    Route::get('/news/create',       [AdminNewsController::class, 'create'])->name('news.create');
    Route::post('/news/create',       [AdminNewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit',  [AdminNewsController::class, 'edit'])->name('news.edit');
    Route::patch('/news/{news}',     [AdminNewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}',    [AdminNewsController::class, 'destroy'])->name('news.destroy');
});

Route::post('/comment/{alias}/{url}',  [CommentController::class,  'store'])->name('comment');

Route::get('/aboutus',                      [AboutController::class, 'index'])->name('aboutus');;

Route::view('dashboard', 'dashboard')->name('dashboard')->middleware(['auth', 'verified']);
