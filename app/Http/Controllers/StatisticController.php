<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\News;
use App\Models\User;

class StatisticController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $news = new News();
        $articles = new Article();
        $users = new User();
        $longestArticle = $articles->longest();
        $shortestArticle = $articles->shortest();
        $mostActiveAuthor = $users->mostActiveAuthor();
        $popularArticle = $articles->popularArticle();
        $mostInconsistentArticle = $articles->mostInconsistentArticle();


        return view('statistics.index', compact('news', 'articles', 'users',
            'longestArticle', 'shortestArticle', 'mostActiveAuthor', 'popularArticle', 'mostInconsistentArticle'));
    }
}
