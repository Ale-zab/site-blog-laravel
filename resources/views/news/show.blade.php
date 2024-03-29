@section('title', $news->name)
@extends('common.layout')

@section('content')
    <main class="container">
        <div class="row g-5">
            <div class="col-md-12">
                <article class="blog-post">
                    <h2 class="blog-post-title">{{ $news->name }}</h2>

                    <p class="blog-post-meta">{{ $news->created_at->toFormattedDateString() }}</p>

                    @include('tags', ['tags' => $news->tags])

                    <p class="mt-4">{{ $news->description }}</p>
                </article>

                @include('comment', ['alias' => 'news','data' => $news])
            </div>
        </div>
    </main>
@endsection
