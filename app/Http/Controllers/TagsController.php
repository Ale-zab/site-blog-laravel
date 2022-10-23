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
        $data['articles'] = $tag->articles()->with('tags')->get();
        $data['news'] = $tag->news()->with('tags')->get();

        return view('tags.index', compact('data'));
    }
}
