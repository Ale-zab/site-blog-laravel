<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Tag $tag)
    {
        $articles   = $tag->articles()->with('tags')->get();

        return view('articles', compact('articles'));
    }
}
