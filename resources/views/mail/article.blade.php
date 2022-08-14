<h1>{{ $article->name }}</h1>
<h2>Событие - {{ $event }}</h2>
<p>{{ $article->description }}</p>

@if ($status)
    <a target="_blank" href="/articles/{{ $article->url }}">
        Перейти
    </a>
@endif
