
@section('title', 'Главная')
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">О нас</h1>
                <p class="lead my-3">Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные
                    тексты. Даже рот всемогущая всеми, моей, составитель, жаренные маленький дал рыбного ты запятой путь
                    реторический безорфографичный скатился? Если путь ipsum заголовок, лучше в...</p>
                <p class="lead mb-0"><a href="/aboutus" class="text-white fw-bold">Читать дальше</a></p>
            </div>
        </div>

        <div class="row mb-2">
            @if($articles->isNOtEmpty())
                @foreach($articles as $articele)
                    <div class="col-md-6">
                        <div
                            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <h3 class="mb-0">{{$articele->name}}</h3>
                                <div class="mb-1 text-muted">{{$articele->created_at->toFormattedDateString()}}</div>
                                <p class="card-text mb-auto">{{$articele->short_description}}...</p>
                                <a href="/articles/{{$articele->url}}" class="stretched-link">Читать дальше</a>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <svg class="bd-placeholder-img" width="200" height="250"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
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
    </main>
@endsection
