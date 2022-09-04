<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;

Route::get('/',                             [HomeController::class, 'index'])->name('index');

Route::resource('/articles', ArticleController::class);

Route::get('/articles/tags/{tag}',          [TagsController::class,  'index']);

Route::get('/contacts',                     [ContactController::class, 'index'])->name('contacts');
Route::post('/contacts',                    [ContactController::class, 'store']);

Route::get('/admin',                        [AdminController::class, 'index'])->name('admin');
Route::get('/admin/feedback',               [AdminController::class, 'feedback']);

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/articles',                 [AdminArticleController::class, 'index'])->name('article');
    Route::get('/articles/{article}/edit',  [AdminArticleController::class, 'edit'])->name('article.edit');
    Route::put('/articles/{article}',       [AdminArticleController::class, 'update'])->name('article.update');
    Route::delete('/articles/{article}',    [AdminArticleController::class, 'destroy'])->name('article.destroy');
});

Route::get('/aboutus',                      [AboutController::class, 'index'])->name('aboutus');;

Route::view('dashboard', 'dashboard')->name('dashboard')->middleware(['auth', 'verified']);
