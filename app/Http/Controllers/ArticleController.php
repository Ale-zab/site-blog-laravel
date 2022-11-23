<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Services\TagsSynchronizer;
use Illuminate\Support\Collection;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = \Cache::tags(['articles'])->rememberForever('article_list_' . request('page'), function () {
            return Article::with('tags')->publish()->paginate(10);
        });

        return view('articles', compact('articles'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $request['owner_id'] = auth()->id();
        $article->fill($request->all());
        $article->save();

        TagsSynchronizer::sync($this->getCollectTags(request('tags')), $article);

        return redirect('/articles/' . $article->url);
    }

    public function show($url)
    {
        $article = \Cache::tags(['articles'])->rememberForever('article_item_' . $url, function () use ($url) {
            return Article::where('url', $url)->first();
        });

        return view('show', compact('article'));
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        return view('edit', compact('article'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->save();

        TagsSynchronizer::sync($this->getCollectTags(request('tags')), $article);

        return redirect('/articles/' . $article->url);
    }

    public function destroy(Article $article)
    {
        $this->authorize('update', $article);
        $article->delete();

        return redirect('/articles');
    }

    protected function getCollectTags($request = ''): Collection
    {
        $tags = collect(explode(',', $request))->keyBy(function ($item) {
            return $item;
        });

        return $tags;
    }
}
