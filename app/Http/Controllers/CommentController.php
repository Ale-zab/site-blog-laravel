<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\Relation;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($alias, $url, Comment $comment, CommentRequest $request)
    {
        $class = Relation::getMorphedModel($alias);
        $model = $class::where('url', $url)->first();

        $comment->description = $request->description;
        $comment->user_id = auth()->user()->id;
        $model->comments()->save($comment);

        return redirect()->route($alias . '.show', $model);
    }
}
