<h1>Новые статьи за прошедший период</h1>

@foreach($articles as $article)
    <div>
        <p>{{ $article->name }}</p>

        <a target="_blank" href="/articles/{{ $article->url }}">
            Перейти
        </a>

    </div>
@endforeach
