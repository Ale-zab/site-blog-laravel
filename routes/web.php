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

Route::get('/admin/articles',               [AdminArticleController::class, 'index'])->name('admin.article');
Route::get('/admin/articles/{url}/edit',    [AdminArticleController::class, 'edit']);
Route::post('/admin/articles/{url}',        [AdminArticleController::class, 'update']);
Route::get('/admin/articles/{url}',         [AdminArticleController::class, 'edit']);
Route::post('/admin/articles/delete/{url}', [AdminArticleController::class, 'destroy']);

Route::get('/aboutus',                      [AboutController::class, 'index'])->name('aboutus');;

Route::view('dashboard', 'dashboard')->name('dashboard')->middleware(['auth', 'verified']);
