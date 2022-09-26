<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCommentRequest;
use App\Models\Article;
use App\Models\ArticleComment;

class ArticleCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Article $article, ArticleComment $articleComment, ArticleCommentRequest $request)
    {
        $data = [
            'user_id' => auth()->id(),
            'article_id' => $article->id,
        ];

        $articleComment->fill(array_merge($data, $request->all()));
        $articleComment->save();
        return redirect()->route('articles.show', $article);
    }
}
