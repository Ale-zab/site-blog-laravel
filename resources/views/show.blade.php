@section('title', $article->name)
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <article class="blog-post">
                    <h2 class="blog-post-title">{{ $article->name }}</h2>
                    <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }} /
                        <a href="/articles/{{ $article->url }}/edit">Редактировать</a>
                    </p>

                    @include('tags', ['tags' => $article->tags])

                    <p class="mt-4">{{ $article->description }}</p>
                </article>
            </div>

            @include('common.column')
        </div>
    </main>
@endsection
