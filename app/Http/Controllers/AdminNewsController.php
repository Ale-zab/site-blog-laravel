<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;

class AdminNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $news = News::paginate(20);

        return view('admin.news.index', compact('news'));
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(NewsRequest $request, News $news)
    {
        $news->fill($request->all());
        $news->save();

        return redirect()
            ->route('admin.news.index')
            ->with('status', __('action.update'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsRequest $request, News $news)
    {
        $request['owner_id'] = auth()->id();
        $news->fill($request->all());
        $news->save();

        return redirect()
            ->route('admin.news.index')
            ->with('status', __('action.store'));
    }


    public function destroy(News $news)
    {
        abort_if(!$news, 404);
        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('status', __('action.destroy'));
    }
}
