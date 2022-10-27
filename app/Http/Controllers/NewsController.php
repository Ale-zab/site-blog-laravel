<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = \Cache::tags(['news'])->rememberForever('news_list_' . request('page', 1), function () {
            return News::publish()->paginate(10);;
        });

        return view('news.index', compact('news'));
    }

    public function show($url)
    {
        $news = \Cache::tags(['news'])->rememberForever('news_item_' . $url, function () use ($url) {
            return News::findOrFail($url);
        });

        return view('news.show', compact('news'));
    }
}
