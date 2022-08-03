@section('title', 'Статьи')
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <article>
                    <h1 class="blog-post-title">Статьи</h1>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот
                        всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь реторический
                        безорфографичный скатился?</p>
                </article>

                <div class="row mb-2">
                    @if($articles->isNOtEmpty())
                        @foreach($articles as $article)
                            <div class="col-md-6 mb-4">
                                <div
                                    class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-100 position-relative">
                                    <div class="col p-4 d-flex flex-column position-static">
                                        <h3 class="mb-0">{{$article->name}}</h3>
                                        <div class="text-muted">{{$article->created_at->toFormattedDateString()}}</div>
                                        <p class="mb-2 card-text">{{$article->short_description}}...</p>

                                        @include('tags', ['tags' => $article->tags])

                                        <a href="/articles/{{$article->url}}" class="mt-3 mb-0 stretched-link">Читать дальше</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12 error">
                            <div class="row g-0 border rounded overflow-hiddenmb-12 shadow-sm error__content">
                                <div class="error__text">
                                    Статьи не найдены
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>

            @include('common.column')
        </div>
    </main>
@endsection
