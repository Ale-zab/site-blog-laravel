@section('title', 'Админ. раздел')
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-12">
                <article>
                    <h1 class="blog-post-title">Статистика</h1>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот
                        всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь реторический
                        безорфографичный скатился?</p>
                </article>
                <div class="row">
                    <div class="col-6">
                        <b>Общее количество статей:</b> {{ $articles->count() }}
                    </div>

                    <div class="col-6">
                        <b>Общее количество новостей:</b> {{ $news->count() }}
                    </div>

                    <div class="col-6">
                        <b>Больше всего статей на сайте у:</b>
                        @if ($mostActiveAuthor)
                            {{ $mostActiveAuthor->name }}
                        @else
                            Не найдено
                        @endif
                    </div>

                    <div class="col-6">
                        <b>Самая длинная статья:</b>
                        @if ($longestArticle)
                            <a href="/articles/{{ $longestArticle->url }}">{{ $longestArticle->name }}</a>
                        @else
                            Не найдено
                        @endif
                    </div>

                    <div class="col-6">
                        <b>Самая короткая статья:</b>
                        @if ($shortestArticle)
                            <a href="/articles/{{ $shortestArticle->url }}">{{ $shortestArticle->name }}</a>
                        @else
                            Не найдено
                        @endif
                    </div>

                    <div class="col-6">
                        <b>Средние количество статей у активных
                            пользователей:</b> {{ $users->averageNumberOfArticles() }}
                    </div>

                    <div class="col-6">
                        <b>Самая непостоянная статья:</b>
                        <a href="/articles/{{ $mostInconsistentArticle->url }}">{{ $mostInconsistentArticle->name }}</a>
                    </div>

                    <div class="col-6">
                        <b>Самая обсуждаемая статья:</b>
                        <a href="/articles/{{ $popularArticle->url }}">{{ $popularArticle->name }}</a>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
