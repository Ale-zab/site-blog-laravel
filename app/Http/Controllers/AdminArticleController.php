<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Services\TagsSynchronizer;
use Illuminate\Support\Collection;

class AdminArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $articles = Article::all();

        return view('admin.articles', compact('articles'));
    }

    public function edit($url)
    {
        $article = Article::where('url', $url)->first();
        abort_if(!$article, 404);
        
        return view('admin.edit', compact('article'));
    }

    public function update(ArticleRequest $request, $url)
    {
        $article = Article::where('url', $url)->first();
        abort_if(!$article, 404);

        $article->fill($request->all());
        $article->save();

        TagsSynchronizer::sync($this->getCollectTags(request('tags')), $article);

        return redirect('/admin/articles/');
    }

    public function destroy($url)
    {
        $article = Article::where('url', $url)->first();
        abort_if(!$article, 404);
        $article->delete();

        return redirect('/admin/articles');
    }

    protected function getCollectTags($request = ''): Collection
    {
        $tags = collect(explode(',', $request))->keyBy(function ($item) {
            return $item;
        });

        return $tags;
    }
}
