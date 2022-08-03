<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $articles = $tag->articles()->with('tags')->get();
        $tags     = Tag::all();

        return view('articles', compact('articles', 'tags'));

    }
}

