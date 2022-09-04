<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
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

        User::factory(5)->create()->each(function (User $user) {
            Article::factory(rand(1, 5))->create(['owner_id' => $user->id])->each(function (Article $article) {
                $article->tags()->save(
                    Tag::inRandomOrder()->first()
                );
            });
        });
    }
}
