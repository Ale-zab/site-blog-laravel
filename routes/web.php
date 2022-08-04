<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;

Route::get('/',                 [HomeController::class, 'index']);

Route::resource('/articles', ArticleController::class);

Route::get('/articles/tags/{tag}',  [TagsController::class,  'index']);

Route::get('/contacts',         [ContactController::class, 'index']);
Route::post('/contacts',        [ContactController::class, 'store']);

Route::get('/admin',            [AdminController::class, 'index']);
Route::get('/admin/feedback',   [AdminController::class, 'feedback']);
Route::get('/aboutus',          [AboutController::class, 'index']);







Route::view('dashboard', 'dashboard')
	->name('dashboard')
	->middleware(['auth', 'verified']);
