@section('title', 'Статьи')
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-12">
                <article>
                    <h1 class="blog-post-title">Статьи и новости по тегу</h1>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот
                        всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь реторический
                        безорфографичный скатился?</p>
                </article>

                <div class="row mb-2">

                    <div class="col-md-6 p-4">
                        <div class="rounded">
                            <h4 class="blog-post-title">Статьи</h4>

                            <div class="row">
                                @forelse($data['articles'] as $article)
                                    <div class="col-md-6 mb-4">
                                        <div
                                            class="row g-0 border bg-white rounded  overflow-hidden flex-md-row shadow-sm h-100 position-relative">
                                            <div class="col p-4 d-flex flex-column position-static">
                                                <h3 class="fs-5 mb-0">{{$article->name}}</h3>
                                                <div
                                                    class="text-muted">{{$article->created_at->toFormattedDateString()}}
                                                    /
                                                    Статьи
                                                </div>
                                                <p class="mb-2 fs-6 card-text">{{ mb_strimwidth($article->short_description, 0, 50, '...') }}</p>

                                                @include('tags', ['tags' => $article->tags])

                                                <a href="/articles/{{$article->url}}" class="mt-3 mb-0 stretched-link">Читать
                                                    дальше</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12 error">
                                        <div
                                            class="row g-0 border bg-white rounded overflow-hiddenmb-12 shadow-sm error__content">
                                            <div class="error__text">
                                                Статьи по тегу не найдены
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bg-info p-4 bg-gradient rounded">
                            <h4 class="blog-post-title">Новости</h4>
                            <div class="row">
                                @forelse($data['news'] as $new)
                                    <div class="col-md-6 mb-4">
                                        <div
                                            class="row g-0 border  bg-white rounded  overflow-hidden flex-md-row shadow-sm h-100 position-relative">
                                            <div class="col p-4 d-flex flex-column position-static">
                                                <h3 class="fs-5 mb-0">{{$new->name}}</h3>
                                                <div class="text-muted">{{$new->created_at->toFormattedDateString()}} /
                                                    Новости
                                                </div>
                                                <p class="mb-2 fs-6 card-text">{{ mb_strimwidth($new->description, 0, 50, '...') }}</p>

                                                @include('tags', ['tags' => $new->tags])

                                                <a href="/articles/{{$new->url}}" class="mt-3 mb-0 stretched-link">Читать
                                                    дальше</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12 error ">
                                        <div
                                            class="row bg-white g-0 border rounded overflow-hiddenmb-12 shadow-sm error__content">
                                            <div class="error__text">
                                                Новости по тегу не найдены
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
