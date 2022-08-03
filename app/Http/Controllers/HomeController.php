<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::publish();

        return view('welcome', compact('articles'));
    }
}
