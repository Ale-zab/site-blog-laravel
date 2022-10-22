<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Jobs\Report;
use App\Models\Article;
use App\Models\Comment;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        return view('admin.report');
    }

    public function createJob(ReportRequest $request)
    {
        foreach ($request->report as $value) {
            $methodName = 'get' . Str::headline($value) . 'Сount';

            if (method_exists($this, $methodName)) {
                $data[] = $this->{$methodName}();
            }
        }

        Report::dispatch(Auth::user(), $data);

        return redirect()->route('report')->with('status', 'Отчет готов, скоро он придет на почту!');
    }

    private function getCommentСount(): string
    {
        return 'Коментариев: ' . Comment::all()->count();
    }

    private function getArticleСount(): string
    {
        return 'Статей: ' . Article::all()->count();
    }

    private function getNewsСount(): string
    {
        return 'Новостей: ' . News::all()->count();
    }

    private function getTagСount(): string
    {
        return 'Тегов: ' . Tag::all()->count();
    }

    private function getUserСount(): string
    {
        return 'Пользователей: ' . User::all()->count();
    }
}
