<?php

namespace App\Events\Article;

use App\Models\Article;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ArticleDeleted
{
    use Dispatchable, SerializesModels;

    public $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }
}
