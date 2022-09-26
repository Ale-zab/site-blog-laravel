@section('title', 'Статьи')
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-12">
                <article>
                    <h1 class="blog-post-title">Новости</h1>
                    <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Даже рот
                        всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь реторический
                        безорфографичный скатился?</p>
                </article>

                <div class="row mb-2">
                    @if($news->isNotEmpty())
                        @foreach($news as $item)
                            <div class="col-md-4 mb-4">
                                <div
                                    class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-100 position-relative">
                                    <div class="col p-4 d-flex flex-column position-static">
                                        <h3 class="mb-0">{{$item->name}}</h3>
                                        <div class="text-muted">{{$item->created_at->toFormattedDateString()}}</div>
                                        <p class="mb-2 card-text">{{ mb_strimwidth($item->description, 0, 150, '...') }}</p>

                                        <a href="/news/{{$item->url}}" class="mt-3 mb-0 stretched-link">Читать дальше</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{ $news->links() }}
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
        </div>
    </main>
@endsection
