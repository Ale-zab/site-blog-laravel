<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use App\Models\Article;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::flushEventListeners();

        Article::factory(40)->create()->each(function (Article $article) {
            $article->tags()->save(
                Tag::inRandomOrder()->first()
            );
        });
    }
}
